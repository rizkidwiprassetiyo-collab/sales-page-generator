<div>
    <div class="auth-form-heading">
        <h2>Log in to your account</h2>
        <p>Enter your email and password below to log in</p>
    </div>

    <form wire:submit="login" class="auth-form">
        <div class="auth-field">
            <label for="email">Email address</label>
            <input
                wire:model="email"
                id="email"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            >
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

            <input
                wire:model="password"
                id="password"
                type="password"
                required
                autocomplete="current-password"
                placeholder="Password"
            >
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
</div>