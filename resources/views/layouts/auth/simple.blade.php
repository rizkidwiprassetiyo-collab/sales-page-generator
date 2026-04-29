<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
    @include('partials.head')

    <style>
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

        .auth-label-row a:hover,
        .auth-bottom-link a:hover {
            text-decoration: underline;
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
            transition: border-color 160ms ease, box-shadow 160ms ease, transform 160ms ease;
        }

        .auth-field input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.13);
        }

        .auth-error {
            color: #dc2626;
            font-size: 12px;
            line-height: 1.5;
            font-weight: 700;
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
            border-radius: 5px;
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
            transition: transform 180ms ease, box-shadow 180ms ease, filter 180ms ease;
        }

        .auth-submit:hover {
            transform: translateY(-3px) scale(1.015);
            filter: brightness(1.03);
            box-shadow: 0 24px 44px rgba(37, 99, 235, 0.36);
        }

        .auth-submit:active {
            transform: translateY(1px) scale(0.985);
            filter: brightness(0.96);
        }

        .auth-bottom-link {
            margin-top: 22px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }
    </style>
</head>
    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-2">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <span class="flex h-9 w-9 mb-1 items-center justify-center rounded-md">
                        <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <div class="flex flex-col gap-6">
                    {{ $slot }}
                </div>
            </div>
        </div>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
