<div>
    @php
        $benefits = json_decode($salesPage->benefits, true);
        $featuresBreakdown = json_decode($salesPage->features_breakdown, true);
    @endphp

    <style>
        .preview-wrap {
            min-height: 100vh;
            background:
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.10), transparent 34%),
                linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
            padding: 32px;
        }

        .preview-container {
            max-width: 1180px;
            margin: 0 auto;
        }

        .alert {
            margin-bottom: 18px;
            padding: 14px 18px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.06);
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .top-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .page-breadcrumb {
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .premium-btn {
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            padding: 13px 18px;
            border: 0;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            font-weight: 900;
            transform: translateY(0) scale(1);
            transition:
                transform 180ms ease,
                box-shadow 180ms ease,
                background 180ms ease,
                border-color 180ms ease,
                color 180ms ease,
                filter 180ms ease;
            user-select: none;
            will-change: transform;
        }

        .premium-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 80%;
            height: 100%;
            background: linear-gradient(
                120deg,
                transparent 0%,
                rgba(255, 255, 255, 0.48) 50%,
                transparent 100%
            );
            transition: left 520ms ease;
            pointer-events: none;
        }

        .premium-btn:hover {
            transform: translateY(-3px) scale(1.015);
            filter: brightness(1.03);
        }

        .premium-btn:hover::before {
            left: 130%;
        }

        .premium-btn:active {
            transform: translateY(1px) scale(0.985);
            filter: brightness(0.96);
        }

        .premium-btn-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 55%, #1e40af 100%);
            color: white;
            box-shadow: 0 18px 34px rgba(37, 99, 235, 0.28);
        }

        .premium-btn-primary:hover {
            box-shadow: 0 24px 44px rgba(37, 99, 235, 0.36);
        }

        .premium-btn-light {
            background: #ffffff;
            color: #0f172a;
            border: 1px solid #e2e8f0;
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
        }

        .premium-btn-light:hover {
            border-color: #cbd5e1;
            box-shadow: 0 20px 38px rgba(15, 23, 42, 0.12);
        }

        .landing-preview {
            overflow: hidden;
            border-radius: 32px;
            border: 1px solid #dbe3ef;
            background: #ffffff;
            box-shadow: 0 28px 80px rgba(15, 23, 42, 0.12);
        }

        .sales-hero {
            position: relative;
            overflow: hidden;
            padding: 46px;
            color: #ffffff;
            background:
                radial-gradient(circle at 82% 20%, rgba(96, 165, 250, 0.45), transparent 28%),
                linear-gradient(135deg, #0f172a 0%, #1e3a8a 52%, #2563eb 100%);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 340px;
            gap: 32px;
            align-items: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.20);
            color: #bfdbfe;
            padding: 8px 12px;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .hero-title {
            max-width: 760px;
            margin: 0;
            font-size: 52px;
            line-height: 1.04;
            letter-spacing: -0.04em;
            font-weight: 950;
        }

        .hero-subtitle {
            max-width: 720px;
            margin: 20px 0 0;
            color: #dbeafe;
            font-size: 17px;
            line-height: 1.85;
            font-weight: 500;
        }

        .hero-mini {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .hero-pill {
            border-radius: 999px;
            padding: 10px 13px;
            background: rgba(255, 255, 255, 0.10);
            border: 1px solid rgba(255, 255, 255, 0.16);
            color: #e0f2fe;
            font-size: 13px;
            font-weight: 800;
        }

        .pricing-card {
            background: rgba(255, 255, 255, 0.96);
            color: #0f172a;
            border-radius: 26px;
            padding: 28px;
            box-shadow: 0 24px 55px rgba(15, 23, 42, 0.28);
            border: 1px solid rgba(255, 255, 255, 0.60);
        }

        .pricing-label {
            color: #64748b;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .pricing-value {
            font-size: 34px;
            line-height: 1;
            color: #1d4ed8;
            font-weight: 950;
            margin-bottom: 18px;
        }

        .pricing-note {
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .section-body {
            padding: 36px 46px 46px;
        }

        .section-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 26px;
            padding: 28px;
            box-shadow: 0 16px 38px rgba(15, 23, 42, 0.06);
        }

        .section-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.2fr) minmax(0, 0.8fr);
            gap: 22px;
            margin-bottom: 22px;
        }

        .two-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
            margin-bottom: 22px;
        }

        .section-label {
            color: #2563eb;
            font-size: 12px;
            font-weight: 950;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            margin-bottom: 10px;
        }

        .section-title {
            color: #0f172a;
            font-size: 24px;
            line-height: 1.2;
            font-weight: 950;
            margin: 0 0 14px;
        }

        .section-text {
            color: #475569;
            font-size: 15px;
            line-height: 1.85;
            margin: 0;
        }

        .premium-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 12px;
        }

        .premium-list li {
            position: relative;
            padding: 14px 14px 14px 46px;
            border-radius: 18px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #334155;
            font-size: 14px;
            line-height: 1.65;
            font-weight: 650;
        }

        .premium-list li::before {
            content: "✓";
            position: absolute;
            left: 14px;
            top: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            border-radius: 999px;
            background: #2563eb;
            color: white;
            font-size: 12px;
            font-weight: 950;
        }

        .proof-box {
            border-radius: 22px;
            background: linear-gradient(135deg, #f8fafc 0%, #eef6ff 100%);
            border: 1px solid #dbeafe;
            padding: 24px;
        }

        .quote-mark {
            width: 42px;
            height: 42px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #2563eb;
            color: white;
            font-size: 24px;
            font-weight: 950;
            margin-bottom: 16px;
        }

        .input-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .input-item {
            border-radius: 18px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 16px;
        }

        .input-item-wide {
            grid-column: 1 / -1;
        }

        .input-label {
            color: #64748b;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .input-value {
            color: #0f172a;
            font-size: 14px;
            line-height: 1.7;
            font-weight: 700;
            margin: 0;
        }

        .empty-state {
            color: #94a3b8;
            font-style: italic;
        }

        @media (max-width: 980px) {
            .preview-wrap {
                padding: 20px;
            }

            .hero-grid,
            .section-grid,
            .two-grid,
            .input-grid {
                grid-template-columns: 1fr;
            }

            .sales-hero,
            .section-body {
                padding: 28px;
            }

            .hero-title {
                font-size: 36px;
            }
        }
    </style>

    <div class="preview-wrap">
        <div class="preview-container">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <div class="top-actions">
                <div>
                    <div class="page-breadcrumb">
                        Sales Pages / Preview / {{ $salesPage->product_name }}
                    </div>
                </div>

                <div class="action-buttons">
                    <button
                        wire:click="generateAiCopy"
                        wire:loading.attr="disabled"
                        wire:target="generateAiCopy"
                        type="button"
                        class="premium-btn premium-btn-primary"
                    >
                        <span wire:loading.remove wire:target="generateAiCopy">
                            {{ $salesPage->headline ? 'Re-generate Sales Copy' : 'Generate Sales Copy' }}
                        </span>

                        <span wire:loading wire:target="generateAiCopy">
                            Generating...
                        </span>
                    </button>

                    <a href="{{ route('sales-pages.index') }}" class="premium-btn premium-btn-light">
                        Back to List
                    </a>
                </div>
            </div>

            <main class="landing-preview">
                <section class="sales-hero">
                    <div class="hero-grid">
                        <div>
                            <div class="eyebrow">
                                Sales Page Preview
                            </div>

                            <h1 class="hero-title">
                                {{ $salesPage->headline ?: $salesPage->product_name }}
                            </h1>

                            <p class="hero-subtitle">
                                {{ $salesPage->subheadline ?: $salesPage->description }}
                            </p>

                            <div class="hero-mini">
                                <div class="hero-pill">
                                    Generated sales copy
                                </div>

                                <div class="hero-pill">
                                    Landing page layout
                                </div>

                                <div class="hero-pill">
                                    Saved in database
                                </div>
                            </div>
                        </div>

                        <aside class="pricing-card">
                            <div class="pricing-label">
                                Pricing
                            </div>

                            <div class="pricing-value">
                                {{ $salesPage->pricing_display ?: $salesPage->price ?: '-' }}
                            </div>

                            <p class="pricing-note">
                                Clear pricing display with a conversion-focused call-to-action.
                            </p>

                            <button type="button" class="premium-btn premium-btn-primary" style="width:100%;">
                                {{ $salesPage->call_to_action ?: 'Get Started' }}
                            </button>
                        </aside>
                    </div>
                </section>

                <div class="section-body">
                    <section class="section-grid">
                        <div class="section-card">
                            <div class="section-label">
                                Why This Matters
                            </div>

                            <h2 class="section-title">
                                Built to communicate value clearly
                            </h2>

                            <p class="section-text">
                                {{ $salesPage->product_description ?: $salesPage->description }}
                            </p>
                        </div>

                        <div class="section-card">
                            <div class="section-label">
                                Call To Action
                            </div>

                            <h2 class="section-title">
                                {{ $salesPage->call_to_action ?: 'Get Started' }}
                            </h2>

                            <p class="section-text">
                                A focused CTA helps the page guide visitors toward the next step.
                            </p>
                        </div>
                    </section>

                    <section class="two-grid">
                        <div class="section-card">
                            <div class="section-label">
                                Benefits
                            </div>

                            <h2 class="section-title">
                                What customers gain
                            </h2>

                            @if(is_array($benefits) && count($benefits))
                                <ul class="premium-list">
                                    @foreach($benefits as $item)
                                        <li>
                                            {{ is_array($item) ? json_encode($item) : $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="section-text empty-state">
                                    {{ $salesPage->benefits ?: 'Generate AI copy to display benefits here.' }}
                                </p>
                            @endif
                        </div>

                        <div class="section-card">
                            <div class="section-label">
                                Features Breakdown
                            </div>

                            <h2 class="section-title">
                                Product highlights
                            </h2>

                            @if(is_array($featuresBreakdown) && count($featuresBreakdown))
                                <ul class="premium-list">
                                    @foreach($featuresBreakdown as $item)
                                        <li>
                                            {{ is_array($item) ? json_encode($item) : $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="section-text empty-state">
                                    {{ $salesPage->features_breakdown ?: 'Generate AI copy to display feature breakdown here.' }}
                                </p>
                            @endif
                        </div>
                    </section>

                    <section class="two-grid">
                        <div class="section-card">
                            <div class="section-label">
                                Social Proof
                            </div>

                            <h2 class="section-title">
                                Trust-building message
                            </h2>

                            <div class="proof-box">
                                <div class="quote-mark">“</div>

                                <p class="section-text">
                                    {{ $salesPage->social_proof ?: 'Generate AI copy to display social proof here.' }}
                                </p>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-label">
                                Page Status
                            </div>

                            <h2 class="section-title">
                                {{ $salesPage->headline ? 'Sales copy ready' : 'Draft saved' }}
                            </h2>

                            <p class="section-text">
                                {{ $salesPage->headline
                                    ? 'This page already has generated sales copy. You can re-generate it anytime.'
                                    : 'This draft is saved. Click Generate Sales Copy to create the full sales page output.'
                                }}
                            </p>
                        </div>
                    </section>

                    <section class="section-card">
                        <div class="section-label">
                            Original Product Input
                        </div>

                        <h2 class="section-title">
                            Source brief used for sales copy generation
                        </h2>

                        <div class="input-grid">
                            <div class="input-item">
                                <div class="input-label">Product Name</div>
                                <p class="input-value">{{ $salesPage->product_name }}</p>
                            </div>

                            <div class="input-item">
                                <div class="input-label">Target Audience</div>
                                <p class="input-value">{{ $salesPage->target_audience ?: '-' }}</p>
                            </div>

                            <div class="input-item">
                                <div class="input-label">Price</div>
                                <p class="input-value">{{ $salesPage->price ?: '-' }}</p>
                            </div>

                            <div class="input-item">
                                <div class="input-label">Unique Selling Points</div>
                                <p class="input-value">{{ $salesPage->unique_selling_points ?: '-' }}</p>
                            </div>

                            <div class="input-item input-item-wide">
                                <div class="input-label">Description</div>
                                <p class="input-value">{{ $salesPage->description }}</p>
                            </div>

                            <div class="input-item input-item-wide">
                                <div class="input-label">Features</div>
                                <p class="input-value">{{ $salesPage->features ?: '-' }}</p>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</div>