<div>
    @php
        $totalPages = $salesPages->count();
        $generatedPages = $salesPages->filter(fn ($page) => filled($page->headline))->count();
        $draftPages = $totalPages - $generatedPages;
    @endphp

    <style>
        .index-wrap {
            min-height: 100vh;
            background:
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.10), transparent 34%),
                linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
            padding: 32px;
        }

        .index-container {
            max-width: 1180px;
            margin: 0 auto;
        }

        .success-alert {
            margin-bottom: 20px;
            border: 1px solid #bbf7d0;
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.06);
        }

        .index-hero {
            border-radius: 30px;
            background:
                radial-gradient(circle at 85% 10%, rgba(96, 165, 250, 0.42), transparent 28%),
                linear-gradient(135deg, #0f172a 0%, #1e3a8a 54%, #2563eb 100%);
            padding: 36px;
            color: #ffffff;
            box-shadow: 0 26px 70px rgba(15, 23, 42, 0.20);
            margin-bottom: 24px;
        }

        .index-hero-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }

        .index-label {
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.20em;
            text-transform: uppercase;
            color: #bfdbfe;
            margin-bottom: 12px;
        }

        .index-title {
            margin: 0;
            font-size: 42px;
            line-height: 1.1;
            letter-spacing: -0.03em;
            font-weight: 950;
        }

        .index-subtitle {
            max-width: 680px;
            margin-top: 14px;
            color: #dbeafe;
            font-size: 15px;
            line-height: 1.8;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 22px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
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
            font-size: 34px;
            line-height: 1;
            font-weight: 950;
        }

        .list-card {
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #dbe3ef;
            border-radius: 30px;
            box-shadow: 0 28px 80px rgba(15, 23, 42, 0.10);
        }

        .list-header {
            padding: 26px 30px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .list-title {
            margin: 0;
            color: #0f172a;
            font-size: 24px;
            font-weight: 950;
        }

        .list-note {
            margin-top: 6px;
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .sales-item {
            padding: 22px 30px;
            border-bottom: 1px solid #e2e8f0;
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 18px;
            align-items: center;
            transition: background 160ms ease;
        }

        .sales-item:last-child {
            border-bottom: 0;
        }

        .sales-item:hover {
            background: #f8fafc;
        }

        .sales-name {
            display: inline-flex;
            color: #0f172a;
            font-size: 18px;
            font-weight: 950;
            text-decoration: none;
            margin-bottom: 8px;
        }

        .sales-name:hover {
            color: #2563eb;
        }

        .sales-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: 7px 10px;
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

        .sales-description {
            margin-top: 10px;
            max-width: 760px;
            color: #475569;
            font-size: 14px;
            line-height: 1.7;
        }

        .sales-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .premium-btn {
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            padding: 12px 16px;
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

        .btn-primary {
            background: #ffffff;
            color: #0f172a;
            box-shadow: 0 16px 34px rgba(255, 255, 255, 0.16);
        }

        .btn-primary:hover {
            background: #eff6ff;
            box-shadow: 0 20px 42px rgba(255, 255, 255, 0.22);
        }

        .btn-view {
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

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #ffffff;
            box-shadow: 0 16px 32px rgba(239, 68, 68, 0.24);
        }

        .empty-state {
            padding: 54px 30px;
            text-align: center;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 18px;
            border-radius: 22px;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1d4ed8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 950;
        }

        .empty-title {
            color: #0f172a;
            font-size: 24px;
            font-weight: 950;
            margin-bottom: 10px;
        }

        .empty-text {
            max-width: 520px;
            margin: 0 auto 22px;
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        @media (max-width: 900px) {
            .index-wrap {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .sales-item {
                grid-template-columns: 1fr;
            }

            .sales-actions {
                justify-content: flex-start;
            }

            .index-title {
                font-size: 34px;
            }
        }
    </style>

    <div class="index-wrap">
        <div class="index-container">
            @if (session()->has('success'))
                <div class="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            <section class="index-hero">
                <div class="index-hero-row">
                    <div>
                        <div class="index-label">Saved Workspace</div>

                        <h1 class="index-title">Sales Pages</h1>

                        <p class="index-subtitle">
                            Review saved product drafts, open generated landing page previews, and remove old sales pages from one clean workspace.
                        </p>
                    </div>

                    <a href="{{ route('sales-pages.create') }}" class="premium-btn btn-primary">
                        + Create New Sales Page
                    </a>
                </div>
            </section>

            <section class="stats-grid">
                <div class="stat-card">
                    <div class="stat-label">Total Pages</div>
                    <div class="stat-value">{{ $totalPages }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-label">AI Generated</div>
                    <div class="stat-value">{{ $generatedPages }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-label">Drafts</div>
                    <div class="stat-value">{{ $draftPages }}</div>
                </div>
            </section>

            <section class="list-card">
                <div class="list-header">
                    <div>
                        <h2 class="list-title">Saved Sales Pages</h2>
                        <p class="list-note">
                            Open a page to generate or re-generate AI copy.
                        </p>
                    </div>
                </div>

                @forelse($salesPages as $page)
                    <article class="sales-item">
                        <div>
                            <a href="{{ route('sales-pages.show', $page->id) }}" class="sales-name">
                                {{ $page->product_name ?: 'Untitled Product' }}
                            </a>

                            <div class="sales-meta">
                                <span>
                                    Created {{ $page->created_at->format('d M Y H:i') }}
                                </span>

                                @if(filled($page->headline))
                                    <span class="status-badge status-generated">
                                        AI Generated
                                    </span>
                                @else
                                    <span class="status-badge status-draft">
                                        Draft
                                    </span>
                                @endif
                            </div>

                            <p class="sales-description">
                                {{ \Illuminate\Support\Str::limit($page->description ?: 'No description available.', 145) }}
                            </p>
                        </div>

                        <div class="sales-actions">
                            <a href="{{ route('sales-pages.show', $page->id) }}" class="premium-btn btn-view">
                                View Preview
                            </a>

                            <button
                                wire:click="delete({{ $page->id }})"
                                type="button"
                                class="premium-btn btn-danger"
                                onclick="if (!confirm('Are you sure you want to delete this sales page?')) { event.stopImmediatePropagation(); return false; }"
                            >
                                Delete
                            </button>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">+</div>

                        <div class="empty-title">
                            No sales pages yet
                        </div>

                        <p class="empty-text">
                            Create your first product draft, then generate AI-powered sales copy and preview it as a landing page.
                        </p>

                        <a href="{{ route('sales-pages.create') }}" class="premium-btn btn-view">
                            Create First Sales Page
                        </a>
                    </div>
                @endforelse
            </section>
        </div>
    </div>
</div>