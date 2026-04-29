<div>
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
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
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
            background: linear-gradient(135deg, #0f172a, #1e3a8a, #2563eb);
            box-shadow: 0 30px 80px rgba(15, 23, 42, 0.24);
        }

        .auth-brand-content {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .auth-brand-top {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .auth-logo-box,
        .auth-card-logo {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #8b5cf6, #2563eb);
            color: white;
            font-weight: 950;
            box-shadow: 0 14px 30px rgba(37, 99, 235, .38);
            border: 3px solid rgba(255,255,255,.55);
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
            background: rgba(255,255,255,.94);
            border: 1px solid rgba(203, 213, 225, .85);
            box-shadow: 0 30px 80px rgba(15, 23, 42, 0.12);
            padding: 42px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-card-logo {
            margin: 0 auto 28px;
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
            box-sizing: border-box;
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

        .auth-bottom-link {
            margin-top: 22px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }

        .auth-error {
            color: #dc2626;
            font-size: 12px;
            font-weight: 700;
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

    <main class="auth-shell">
        <section class="auth-grid">
            <aside class="auth-brand-panel">
                <div class="auth-brand-content">
                    <div class="auth-brand-top">
                        <div class="auth-logo-box">SP</div>
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

                <div class="auth-form-heading">
                    <h2>Log in to your account</h2>
                    <p>Enter your email and password below to log in</p>
                </div>

                <form wire:submit="login" class="auth-form">
                    <div class="auth-field">
                        <label for="email">Email address</label>
                        <input wire:model="email" id="email" type="email" required autofocus autocomplete="email" placeholder="email@example.com">
                        @error('email')
                            <div class="auth-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <div class="auth-label-row">
                            <label for="password">Password</label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" wire:navigate>
                                    Forgot your password?
                                </a>
                            @endif
                        </div>

                        <input wire:model="password" id="password" type="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <div class="auth-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <label class="auth-check">
                        <input wire:model="remember" type="checkbox">
                        <span>Remember me</span>
                    </label>

                    <button type="submit" class="auth-submit">
                        Log in
                    </button>
                </form>

                <div class="auth-bottom-link">
                    Don’t have an account?
                    <a href="{{ route('register') }}" wire:navigate>Sign up</a>
                </div>
            </section>
        </section>
    </main>
</div>