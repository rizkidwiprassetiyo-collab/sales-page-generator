<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>

    <body>
        <style>
            .auth-page {
                min-height: 100vh;
                background:
                    radial-gradient(circle at top right, rgba(37, 99, 235, 0.16), transparent 32%),
                    radial-gradient(circle at bottom left, rgba(124, 58, 237, 0.12), transparent 30%),
                    linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 32px;
                font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            }

            .auth-shell {
                width: 100%;
                max-width: 1080px;
                display: grid;
                grid-template-columns: minmax(0, 1fr) 420px;
                gap: 28px;
                align-items: stretch;
            }

            .auth-brand-panel {
                position: relative;
                overflow: hidden;
                border-radius: 34px;
                padding: 44px;
                color: #ffffff;
                background:
                    radial-gradient(circle at 88% 12%, rgba(103, 232, 249, 0.34), transparent 28%),
                    linear-gradient(135deg, #0f172a 0%, #1e3a8a 54%, #2563eb 100%);
                box-shadow: 0 30px 90px rgba(15, 23, 42, 0.22);
                min-height: 560px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .auth-brand-panel::before {
                content: "";
                position: absolute;
                inset: 0;
                background-image:
                    linear-gradient(30deg, rgba(255,255,255,0.06) 12%, transparent 12.5%, transparent 87%, rgba(255,255,255,0.06) 87.5%, rgba(255,255,255,0.06)),
                    linear-gradient(150deg, rgba(255,255,255,0.06) 12%, transparent 12.5%, transparent 87%, rgba(255,255,255,0.06) 87.5%, rgba(255,255,255,0.06));
                background-size: 52px 91px;
                opacity: 0.24;
            }

            .auth-brand-content {
                position: relative;
                z-index: 1;
            }

            .auth-logo-row {
                display: flex;
                align-items: center;
                gap: 14px;
                margin-bottom: 42px;
            }

            .auth-logo-box {
                width: 52px;
                height: 52px;
                border-radius: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: rgba(255, 255, 255, 0.12);
                border: 1px solid rgba(255, 255, 255, 0.20);
                box-shadow: 0 20px 44px rgba(15, 23, 42, 0.18);
            }

            .auth-logo-box svg {
                width: 42px;
                height: 42px;
            }

            .auth-app-name {
                font-size: 18px;
                line-height: 1.25;
                font-weight: 950;
            }

            .auth-app-subtitle {
                margin-top: 3px;
                color: #bfdbfe;
                font-size: 12px;
                font-weight: 800;
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }

            .auth-eyebrow {
                display: inline-flex;
                border-radius: 999px;
                padding: 8px 12px;
                background: rgba(255, 255, 255, 0.12);
                border: 1px solid rgba(255, 255, 255, 0.18);
                color: #bfdbfe;
                font-size: 12px;
                font-weight: 900;
                letter-spacing: 0.14em;
                text-transform: uppercase;
                margin-bottom: 18px;
            }

            .auth-title {
                margin: 0;
                max-width: 650px;
                font-size: 48px;
                line-height: 1.06;
                letter-spacing: -0.04em;
                font-weight: 950;
            }

            .auth-text {
                margin-top: 18px;
                max-width: 620px;
                color: #dbeafe;
                font-size: 16px;
                line-height: 1.85;
                font-weight: 500;
            }

            .auth-feature-grid {
                position: relative;
                z-index: 1;
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 12px;
                margin-top: 36px;
            }

            .auth-feature {
                border-radius: 20px;
                padding: 16px;
                background: rgba(255, 255, 255, 0.10);
                border: 1px solid rgba(255, 255, 255, 0.16);
                backdrop-filter: blur(8px);
            }

            .auth-feature-number {
                color: #ffffff;
                font-size: 22px;
                line-height: 1;
                font-weight: 950;
                margin-bottom: 8px;
            }

            .auth-feature-label {
                color: #bfdbfe;
                font-size: 11px;
                font-weight: 900;
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }

            .auth-card-wrap {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .auth-card {
                width: 100%;
                border-radius: 32px;
                padding: 34px;
                background: rgba(255, 255, 255, 0.92);
                border: 1px solid #dbe3ef;
                box-shadow: 0 28px 80px rgba(15, 23, 42, 0.12);
                backdrop-filter: blur(14px);
            }

            .auth-card-logo {
                display: flex;
                justify-content: center;
                margin-bottom: 18px;
            }

            .auth-card-logo a {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 58px;
                height: 58px;
                border-radius: 20px;
                background: #ffffff;
                border: 1px solid #e2e8f0;
                box-shadow: 0 18px 38px rgba(37, 99, 235, 0.16);
                text-decoration: none;
            }

            .auth-card-logo svg {
                width: 44px;
                height: 44px;
            }

            .auth-card form {
                margin-top: 22px;
            }

            .auth-card input {
                border-radius: 16px !important;
                min-height: 44px;
            }

            .auth-card button[type="submit"] {
                position: relative;
                overflow: hidden;
                border-radius: 16px !important;
                min-height: 46px;
                background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 55%, #1e40af 100%) !important;
                color: white !important;
                border: none !important;
                font-weight: 900 !important;
                box-shadow: 0 18px 34px rgba(37, 99, 235, 0.28) !important;
                transition: transform 180ms ease, box-shadow 180ms ease, filter 180ms ease !important;
            }

            .auth-card button[type="submit"]:hover {
                transform: translateY(-3px) scale(1.015);
                filter: brightness(1.03);
                box-shadow: 0 24px 44px rgba(37, 99, 235, 0.36) !important;
            }

            .auth-card button[type="submit"]:active {
                transform: translateY(1px) scale(0.985);
                filter: brightness(0.96);
            }

            .auth-card a {
                color: #2563eb;
                font-weight: 800;
            }

            @media (max-width: 980px) {
                .auth-shell {
                    grid-template-columns: 1fr;
                }

                .auth-brand-panel {
                    min-height: auto;
                    padding: 32px;
                }

                .auth-title {
                    font-size: 36px;
                }

                .auth-feature-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>

        <main class="auth-page">
            <div class="auth-shell">
                <section class="auth-brand-panel">
                    <div class="auth-brand-content">
                        <div class="auth-logo-row">
                            <div class="auth-logo-box">
                                <x-app-logo-icon />
                            </div>

                            <div>
                                <div class="auth-app-name">AI Sales Page Generator</div>
                                <div class="auth-app-subtitle">Copywriting Workspace</div>
                            </div>
                        </div>

                        <div class="auth-eyebrow">
                            AI-Powered Product Marketing
                        </div>

                        <h1 class="auth-title">
                            Turn product details into polished sales pages.
                        </h1>

                        <p class="auth-text">
                            Create product drafts, generate persuasive AI copy, preview a landing-page style output, and manage saved pages from one clean workspace.
                        </p>
                    </div>

                    <div class="auth-feature-grid">
                        <div class="auth-feature">
                            <div class="auth-feature-number">01</div>
                            <div class="auth-feature-label">Product Brief</div>
                        </div>

                        <div class="auth-feature">
                            <div class="auth-feature-number">02</div>
                            <div class="auth-feature-label">AI Copy</div>
                        </div>

                        <div class="auth-feature">
                            <div class="auth-feature-number">03</div>
                            <div class="auth-feature-label">Preview</div>
                        </div>
                    </div>
                </section>

                <section class="auth-card-wrap">
                    <div class="auth-card">
                        <div class="auth-card-logo">
                            <a href="{{ route('home') }}" wire:navigate>
                                <x-app-logo-icon />
                            </a>
                        </div>

                        {{ $slot }}
                    </div>
                </section>
            </div>
        </main>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>