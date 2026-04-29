<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')

    <style>
        body {
            margin: 0;
            background:
                radial-gradient(circle at top left, rgba(124, 58, 237, 0.14), transparent 32%),
                linear-gradient(135deg, #f8fafc 0%, #eef4ff 45%, #eef2ff 100%);
            color: #0f172a;
        }

        .auth-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 48px 24px;
        }

        .auth-grid {
            width: min(100%, 1060px);
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 28px;
            align-items: stretch;
        }

        .auth-brand-panel {
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            padding: 42px;
            min-height: 560px;
            color: white;
            background:
                linear-gradient(135deg, rgba(15, 23, 42, 0.96), rgba(30, 64, 175, 0.94), rgba(37, 99, 235, 0.96));
            box-shadow: 0 30px 80px rgba(15, 23, 42, 0.24);
        }

        .auth-brand-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: 0.15;
            background-image:
                linear-gradient(30deg, rgba(255,255,255,.12) 12%, transparent 12.5%, transparent 87%, rgba(255,255,255,.12) 87.5%, rgba(255,255,255,.12)),
                linear-gradient(150deg, rgba(255,255,255,.12) 12%, transparent 12.5%, transparent 87%, rgba(255,255,255,.12) 87.5%, rgba(255,255,255,.12));
            background-size: 44px 76px;
        }

        .auth-brand-content {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .auth-brand-top {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .auth-logo-box {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #8b5cf6, #2563eb);
            box-shadow: 0 14px 30px rgba(37, 99, 235, .38);
            border: 1px solid rgba(255,255,255,.35);
        }

        .auth-logo-box span {
            font-size: 17px;
            font-weight: 900;
            letter-spacing: -0.04em;
        }

        .auth-brand-name {
            font-size: 20px;
            font-weight: 900;
            line-height: 1.15;
        }

        .auth-brand-subtitle {
            margin-top: 4px;
            color: rgba(255,255,255,.72);
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .auth-pill {
            width: fit-content;
            margin-top: 58px;
            padding: 9px 16px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,.2);
            background: rgba(255,255,255,.1);
            color: rgba(255,255,255,.78);
            font-size: 13px;
            font-weight: 900;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .auth-headline {
            margin: 24px 0 0;
            max-width: 680px;
            font-size: clamp(38px, 5vw, 58px);
            line-height: .98;
            letter-spacing: -0.06em;
            font-weight: 950;
        }

        .auth-description {
            max-width: 620px;
            margin-top: 24px;
            color: rgba(255,255,255,.78);
            font-size: 17px;
            line-height: 1.7;
            font-weight: 700;
        }

        .auth-steps {
            margin-top: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .auth-step {
            border-radius: 18px;
            padding: 18px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.18);
            backdrop-filter: blur(10px);
        }

        .auth-step strong {
            display: block;
            font-size: 24px;
            font-weight: 950;
        }

        .auth-step span {
            display: block;
            margin-top: 8px;
            color: rgba(255,255,255,.72);
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .auth-card {
            border-radius: 28px;
            background: rgba(255,255,255,.92);
            border: 1px solid rgba(203, 213, 225, .85);
            box-shadow: 0 30px 80px rgba(15, 23, 42, 0.12);
            padding: 42px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-card-logo {
            margin: 0 auto 28px;
            width: 58px;
            height: 58px;
            border-radius: 20px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #8b5cf6, #2563eb);
            color: white;
            font-weight: 950;
            box-shadow: 0 18px 36px rgba(37, 99, 235, .30);
            border: 4px solid #fff;
        }

        .auth-form-heading {
            text-align: center;
            margin-bottom: 26px;
        }

        .auth-form-heading h2 {
            margin: 0;
            color: #0f172a;
            font-size: 24px;
            line-height: 1.2;
            font-weight: 900;
            letter-spacing: -0.03em;
        }

        .auth-form-heading p {
            margin-top: 8px;
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .auth-form {
            display: grid;
            gap: 18px;
        }

        .auth-field {
            display: grid;
            gap: 8px;
        }

        .auth-field label,
        .auth-label-row label {
            color: #0f172a;
            font-size: 13px;
            font-weight: 800;
        }

        .auth-label-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .auth-label-row a,
        .auth-bottom-link a {
            color: #2563eb;
            font-size: 13px;
            font-weight: 900;
            text-decoration: none;
        }

        .auth-field input[type="email"],
        .auth-field input[type="password"],
        .auth-field input[type="text"] {
            width: 100%;
            min-height: 48px;
            border-radius: 16px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            padding: 0 16px;
            color: #0f172a;
            font-size: 14px;
            outline: none;
        }

        .auth-field input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.13);
        }

        .auth-check {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
        }

        .auth-check input {
            width: 16px;
            height: 16px;
            accent-color: #2563eb;
        }

        .auth-submit {
            width: 100%;
            min-height: 48px;
            border: 0;
            border-radius: 16px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 55%, #1e40af 100%);
            color: #ffffff;
            font-size: 14px;
            font-weight: 900;
            cursor: pointer;
            box-shadow: 0 18px 34px rgba(37, 99, 235, 0.28);
        }

        .auth-submit:hover {
            transform: translateY(-2px);
            filter: brightness(1.03);
        }

        .auth-error {
            color: #dc2626;
            font-size: 12px;
            font-weight: 700;
        }

        .auth-bottom-link {
            margin-top: 22px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 980px) {
            .auth-grid {
                grid-template-columns: 1fr;
            }

            .auth-brand-panel {
                min-height: auto;
            }
        }
    </style>
</head>

<body>
    <main class="auth-shell">
        <section class="auth-grid">
            <aside class="auth-brand-panel">
                <div class="auth-brand-content">
                    <div class="auth-brand-top">
                        <div class="auth-logo-box">
                            <span>SP</span>
                        </div>

                        <div>
                            <div class="auth-brand-name">Sales Page Generator</div>
                            <div class="auth-brand-subtitle">Copywriting Workspace</div>
                        </div>
                    </div>

                    <div class="auth-pill">Product Marketing Workspace</div>

                    <h1 class="auth-headline">
                        Turn product details into polished sales pages.
                    </h1>

                    <p class="auth-description">
                        Create product drafts, generate persuasive sales copy, preview a landing-page style output,
                        and manage saved pages from one clean workspace.
                    </p>

                    <div class="auth-steps">
                        <div class="auth-step">
                            <strong>01</strong>
                            <span>Product Brief</span>
                        </div>

                        <div class="auth-step">
                            <strong>02</strong>
                            <span>Sales Copy</span>
                        </div>

                        <div class="auth-step">
                            <strong>03</strong>
                            <span>Preview</span>
                        </div>
                    </div>
                </div>
            </aside>

            <section class="auth-card">
                <div class="auth-card-logo">SP</div>

                {{ $slot }}
            </section>
        </section>
    </main>

    @fluxScripts
</body>
</html>