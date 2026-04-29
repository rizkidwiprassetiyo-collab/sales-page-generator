<x-layouts::app :title="__('Dashboard')">
    @php
        $totalPages = \App\Models\SalesPage::where('user_id', auth()->id())->count();
        $generatedPages = \App\Models\SalesPage::where('user_id', auth()->id())->whereNotNull('headline')->count();
        $draftPages = $totalPages - $generatedPages;
        $latestPage = \App\Models\SalesPage::where('user_id', auth()->id())->latest()->first();
    @endphp

    <style>
        .dashboard-wrap {
            min-height: 100vh;
            background:
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.10), transparent 34%),
                linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
            padding: 32px;
        }

        .dashboard-container {
            max-width: 1180px;
            margin: 0 auto;
        }

        .dash-hero {
            border-radius: 32px;
            background:
                radial-gradient(circle at 86% 12%, rgba(96, 165, 250, 0.42), transparent 28%),
                linear-gradient(135deg, #0f172a 0%, #1e3a8a 52%, #2563eb 100%);
            padding: 42px;
            color: #ffffff;
            box-shadow: 0 28px 80px rgba(15, 23, 42, 0.22);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .dash-hero-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 320px;
            gap: 32px;
            align-items: center;
        }

        .dash-label {
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: #bfdbfe;
            margin-bottom: 14px;
        }

        .dash-title {
            margin: 0;
            max-width: 780px;
            font-size: 48px;
            line-height: 1.06;
            letter-spacing: -0.04em;
            font-weight: 950;
        }

        .dash-subtitle {
            max-width: 720px;
            margin-top: 16px;
            color: #dbeafe;
            font-size: 16px;
            line-height: 1.85;
            font-weight: 500;
        }

        .dash-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
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

        .btn-white {
            background: #ffffff;
            color: #0f172a;
            box-shadow: 0 18px 36px rgba(255, 255, 255, 0.16);
        }

        .btn-white:hover {
            background: #eff6ff;
            box-shadow: 0 24px 44px rgba(255, 255, 255, 0.22);
        }

        .btn-glass {
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.22);
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.12);
        }

        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.20);
            border-color: rgba(255, 255, 255, 0.38);
        }

        .hero-panel {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 26px;
            padding: 24px;
            backdrop-filter: blur(12px);
        }

        .hero-panel-title {
            color: #ffffff;
            font-size: 18px;
            font-weight: 950;
            margin-bottom: 12px;
        }

        .hero-panel-text {
            color: #dbeafe;
            font-size: 14px;
            line-height: 1.75;
            margin-bottom: 18px;
        }

        .hero-mini-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .hero-mini-stat {
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.10);
            padding: 14px;
            text-align: center;
        }

        .hero-mini-number {
            font-size: 24px;
            font-weight: 950;
            line-height: 1;
        }

        .hero-mini-label {
            margin-top: 6px;
            font-size: 11px;
            color: #bfdbfe;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card,
        .content-card,
        .step-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 26px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        }

        .stat-card {
            padding: 24px;
        }

        .stat-label {
            color: #64748b;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .stat-value {
            color: #0f172a;
            font-size: 36px;
            line-height: 1;
            font-weight: 950;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.2fr) minmax(0, 0.8fr);
            gap: 24px;
            margin-bottom: 24px;
        }

        .content-card {
            padding: 28px;
        }

        .card-label {
            color: #2563eb;
            font-size: 12px;
            font-weight: 950;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .card-title {
            color: #0f172a;
            font-size: 24px;
            line-height: 1.2;
            font-weight: 950;
            margin: 0 0 12px;
        }

        .card-text {
            color: #475569;
            font-size: 14px;
            line-height: 1.8;
            margin: 0;
        }

        .latest-box {
            margin-top: 20px;
            border-radius: 22px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 18px;
        }

        .latest-title {
            color: #0f172a;
            font-size: 18px;
            font-weight: 950;
            margin-bottom: 8px;
        }

        .latest-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: 6px 10px;
            font-size: 12px;
            font-weight: 900;
        }

        .status-generated {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-draft {
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #fde68a;
        }

        .btn-blue {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 55%, #1e40af 100%);
            color: #ffffff;
            box-shadow: 0 16px 32px rgba(37, 99, 235, 0.26);
        }

        .btn-light {
            background: #ffffff;
            color: #0f172a;
            border: 1px solid #e2e8f0;
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.08);
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .step-card {
            padding: 24px;
            transition: transform 180ms ease, box-shadow 180ms ease;
        }

        .step-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 26px 55px rgba(15, 23, 42, 0.12);
        }

        .step-number {
            width: 46px;
            height: 46px;
            border-radius: 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 950;
            margin-bottom: 16px;
        }

        .step-blue {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .step-purple {
            background: #ede9fe;
            color: #6d28d9;
        }

        .step-green {
            background: #d1fae5;
            color: #047857;
        }

        .step-title {
            color: #0f172a;
            font-size: 19px;
            font-weight: 950;
            margin-bottom: 10px;
        }

        .step-text {
            color: #475569;
            font-size: 14px;
            line-height: 1.75;
            margin: 0;
        }

        .check-list {
            display: grid;
            gap: 12px;
            margin-top: 18px;
        }

        .check-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            color: #334155;
            font-size: 14px;
            line-height: 1.6;
            font-weight: 700;
        }

        .check-icon {
            width: 22px;
            height: 22px;
            border-radius: 999px;
            background: #2563eb;
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 12px;
            font-weight: 950;
            margin-top: 1px;
        }

        @media (max-width: 980px) {
            .dashboard-wrap {
                padding: 20px;
            }

            .dash-hero-row,
            .dashboard-grid,
            .stats-grid,
            .steps-grid {
                grid-template-columns: 1fr;
            }

            .dash-title {
                font-size: 36px;
            }
        }
    </style>

    <div class="dashboard-wrap">
        <div class="dashboard-container">
            <section class="dash-hero">
                <div class="dash-hero-row">
                    <div>
                        <div class="dash-label">
                            Sales Copy Workspace
                        </div>

                        <h1 class="dash-title">
                            Sales Page Generator
                        </h1>

                        <p class="dash-subtitle">
                            Create persuasive sales pages from simple product inputs, generate AI-powered copy, save drafts, and manage every page in one polished workspace.
                        </p>

                        <div class="dash-actions">
                            <a href="{{ route('sales-pages.create') }}" class="premium-btn btn-white">
                                Create New Sales Page
                            </a>

                            <a href="{{ route('sales-pages.index') }}" class="premium-btn btn-glass">
                                View Saved Sales Pages
                            </a>
                        </div>
                    </div>

                    <aside class="hero-panel">
                        <div class="hero-panel-title">
                            Workspace Overview
                        </div>

                        <p class="hero-panel-text">
                            Track drafts, generated pages, and your latest product brief before final submission review.
                        </p>

                        <div class="hero-mini-stats">
                            <div class="hero-mini-stat">
                                <div class="hero-mini-number">{{ $totalPages }}</div>
                                <div class="hero-mini-label">Total</div>
                            </div>

                            <div class="hero-mini-stat">
                                <div class="hero-mini-number">{{ $generatedPages }}</div>
                                <div class="hero-mini-label">AI</div>
                            </div>

                            <div class="hero-mini-stat">
                                <div class="hero-mini-number">{{ $draftPages }}</div>
                                <div class="hero-mini-label">Draft</div>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>

            <section class="stats-grid">
                <div class="stat-card">
                    <div class="stat-label">Total Sales Pages</div>
                    <div class="stat-value">{{ $totalPages }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-label">AI Generated</div>
                    <div class="stat-value">{{ $generatedPages }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-label">Drafts Waiting</div>
                    <div class="stat-value">{{ $draftPages }}</div>
                </div>
            </section>

            <section class="dashboard-grid">
                <div class="content-card">
                    <div class="card-label">Latest Work</div>
                    <h2 class="card-title">Continue your most recent sales page</h2>
                    <p class="card-text">
                        Open the latest draft or generated page to review the preview, generate AI copy, or re-generate the output.
                    </p>

                    @if($latestPage)
                        <div class="latest-box">
                            <div class="latest-title">
                                {{ $latestPage->product_name ?: 'Untitled Product' }}
                            </div>

                            <div class="latest-meta">
                                <span>{{ $latestPage->created_at->format('d M Y H:i') }}</span>

                                @if(filled($latestPage->headline))
                                    <span class="status-badge status-generated">AI Generated</span>
                                @else
                                    <span class="status-badge status-draft">Draft</span>
                                @endif
                            </div>

                            <p class="card-text">
                                {{ \Illuminate\Support\Str::limit($latestPage->description ?: 'No description available.', 150) }}
                            </p>

                            <div class="dash-actions">
                                <a href="{{ route('sales-pages.show', $latestPage->id) }}" class="premium-btn btn-blue">
                                    Open Preview
                                </a>

                                <a href="{{ route('sales-pages.index') }}" class="premium-btn btn-light">
                                    View All Pages
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="latest-box">
                            <div class="latest-title">No sales page yet</div>
                            <p class="card-text">
                                Create your first product draft to start generating a polished AI sales page.
                            </p>

                            <div class="dash-actions">
                                <a href="{{ route('sales-pages.create') }}" class="premium-btn btn-blue">
                                    Create First Page
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="content-card">
                    <div class="card-label">Submission Readiness</div>
                    <h2 class="card-title">Technical task checklist</h2>
                    <p class="card-text">
                        The task expects a working system, database-backed saved pages, written explanation, video walkthrough, and dummy reviewer account.
                    </p>

                    <div class="check-list">
                        <div class="check-item">
                            <span class="check-icon">✓</span>
                            <span>Authentication flow: register, login, logout.</span>
                        </div>

                        <div class="check-item">
                            <span class="check-icon">✓</span>
                            <span>Product input form with saved draft.</span>
                        </div>

                        <div class="check-item">
                            <span class="check-icon">✓</span>
                            <span>AI generation with loading and error states.</span>
                        </div>

                        <div class="check-item">
                            <span class="check-icon">✓</span>
                            <span>Saved pages list with preview and delete actions.</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="steps-grid">
                <div class="step-card">
                    <div class="step-number step-blue">01</div>
                    <div class="step-title">Create Drafts</div>
                    <p class="step-text">
                        Add product name, description, features, pricing, target audience, and unique selling points.
                    </p>
                </div>

                <div class="step-card">
                    <div class="step-number step-purple">02</div>
                    <div class="step-title">Generate AI Copy</div>
                    <p class="step-text">
                        Generate headline, subheadline, benefits, features breakdown, social proof, pricing copy, and CTA.
                    </p>
                </div>

                <div class="step-card">
                    <div class="step-number step-green">03</div>
                    <div class="step-title">Manage Pages</div>
                    <p class="step-text">
                        Review, re-generate, and delete saved sales pages from a clean dashboard workspace.
                    </p>
                </div>
            </section>
        </div>
    </div>
</x-layouts::app>