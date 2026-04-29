<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" {{ $attributes }}>
    <defs>
        <linearGradient id="sp-logo-gradient" x1="5" y1="4" x2="43" y2="44" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#67e8f9" />
            <stop offset="0.42" stop-color="#7c3aed" />
            <stop offset="1" stop-color="#2563eb" />
        </linearGradient>

        <linearGradient id="sp-logo-shine" x1="8" y1="4" x2="40" y2="44" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#ffffff" stop-opacity="0.9" />
            <stop offset="1" stop-color="#ffffff" stop-opacity="0.18" />
        </linearGradient>
    </defs>

    <rect width="48" height="48" rx="16" fill="url(#sp-logo-gradient)" />

    <path
        d="M13 16.5C16.5 13.5 21 12 24 12C27 12 31.5 13.5 35 16.5"
        fill="none"
        stroke="url(#sp-logo-shine)"
        stroke-width="2.4"
        stroke-linecap="round"
    />

    <path
        d="M13 31.5C16.5 34.5 21 36 24 36C27 36 31.5 34.5 35 31.5"
        fill="none"
        stroke="url(#sp-logo-shine)"
        stroke-width="2.4"
        stroke-linecap="round"
        opacity="0.62"
    />

    <circle cx="36" cy="13" r="3.2" fill="#ffffff" opacity="0.9" />
    <circle cx="13" cy="35" r="2.4" fill="#ffffff" opacity="0.65" />

    <text
        x="24"
        y="29.5"
        text-anchor="middle"
        font-size="15"
        font-weight="900"
        font-family="Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif"
        fill="#ffffff"
        letter-spacing="0.3"
    >
        SP
    </text>
</svg>