<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky collapsible="mobile" class="app-sidebar-shell">
            <flux:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:spacer />

                <div class="sidebar-brand-card">
        <div class="sidebar-brand-label">Sales Copy Workspace</div>
        <div class="sidebar-brand-title">Sales Page Generator</div>
        <div class="sidebar-brand-text">
            Create drafts, generate persuasive copy, and manage sales pages in one polished workspace.
        </div>
    </div>

    <div class="sidebar-menu-card">
        <div class="sidebar-menu-title">Platform</div>

        <nav class="sidebar-links">
            <a
                href="{{ route('dashboard') }}"
                wire:navigate
                class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                <span class="sidebar-link-icon">D</span>
                <span>Dashboard</span>
            </a>

            <a
                href="{{ route('sales-pages.create') }}"
                wire:navigate
                class="sidebar-link {{ request()->routeIs('sales-pages.create') ? 'active' : '' }}"
            >
                <span class="sidebar-link-icon">+</span>
                <span>Create Sales Page</span>
            </a>

            <a
                href="{{ route('sales-pages.index') }}"
                wire:navigate
                class="sidebar-link {{ request()->routeIs('sales-pages.index') || request()->routeIs('sales-pages.show') ? 'active' : '' }}"
            >
                <span class="sidebar-link-icon">S</span>
                <span>Saved Sales Pages</span>
            </a>
        </nav>
    </div>

    <flux:spacer />

    <div class="sidebar-footer-card">
        <div class="sidebar-footer-title">Reviewer Mode</div>
        <div class="sidebar-footer-text">
            The app is ready for dashboard, create form, saved pages, and landing page preview testing.
        </div>
    </div>

    <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
    <style>
    .app-sidebar-shell {
        background:
            radial-gradient(circle at top right, rgba(37, 99, 235, 0.08), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
        border-right: 1px solid #dbe3ef;
        box-shadow: inset -1px 0 0 rgba(255, 255, 255, 0.7);
    }

    .sidebar-brand-card {
        border-radius: 22px;
        padding: 18px;
        margin: 14px 10px 18px;
        background:
            radial-gradient(circle at 85% 15%, rgba(96, 165, 250, 0.32), transparent 25%),
            linear-gradient(135deg, #0f172a 0%, #1e3a8a 55%, #2563eb 100%);
        color: #ffffff;
        box-shadow: 0 20px 42px rgba(15, 23, 42, 0.16);
    }

    .sidebar-brand-label {
        font-size: 10px;
        font-weight: 900;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: #bfdbfe;
        margin-bottom: 10px;
    }

    .sidebar-brand-title {
        font-size: 16px;
        line-height: 1.25;
        font-weight: 900;
        margin-bottom: 8px;
    }

    .sidebar-brand-text {
        font-size: 12px;
        line-height: 1.65;
        color: #dbeafe;
    }

    .sidebar-menu-card {
        margin: 0 10px 14px;
        padding: 14px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.82);
        border: 1px solid #e2e8f0;
        box-shadow: 0 16px 34px rgba(15, 23, 42, 0.06);
        backdrop-filter: blur(8px);
    }

    .sidebar-menu-title {
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: #64748b;
        margin-bottom: 12px;
        padding: 0 4px;
    }

    .sidebar-links {
        display: grid;
        gap: 8px;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 12px;
        border-radius: 16px;
        text-decoration: none;
        color: #334155;
        font-size: 14px;
        font-weight: 800;
        transition:
            transform 180ms ease,
            background 180ms ease,
            color 180ms ease,
            box-shadow 180ms ease,
            border-color 180ms ease;
        border: 1px solid transparent;
    }

    .sidebar-link:hover {
        transform: translateX(4px);
        background: #f8fafc;
        color: #0f172a;
        border-color: #e2e8f0;
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.06);
    }

    .sidebar-link.active {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        color: #1d4ed8;
        border-color: #bfdbfe;
        box-shadow: 0 14px 30px rgba(37, 99, 235, 0.10);
    }

    .sidebar-link-icon {
        width: 34px;
        height: 34px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 13px;
        font-weight: 900;
        background: #e2e8f0;
        color: #334155;
        transition: all 180ms ease;
    }

    .sidebar-link.active .sidebar-link-icon {
        background: #2563eb;
        color: #ffffff;
    }

    .sidebar-footer-card {
        margin: 0 10px 10px;
        padding: 14px;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.78);
        border: 1px solid #e2e8f0;
    }

    .sidebar-footer-title {
        color: #0f172a;
        font-size: 13px;
        font-weight: 900;
        margin-bottom: 6px;
    }

    .sidebar-footer-text {
        color: #64748b;
        font-size: 12px;
        line-height: 1.6;
    }
</style>
</html>
