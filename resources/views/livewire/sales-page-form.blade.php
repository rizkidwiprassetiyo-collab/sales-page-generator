<div>
    <style>
        .create-page-wrap {
            min-height: 100vh;
            background: #f8fafc;
            padding: 32px;
        }

        .create-page-container {
            max-width: 1180px;
            margin: 0 auto;
        }

        .create-hero {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 55%, #2563eb 100%);
            border-radius: 28px;
            padding: 36px;
            color: #ffffff;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.22);
            margin-bottom: 28px;
        }

        .create-hero-label {
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: #bfdbfe;
            margin-bottom: 14px;
        }

        .create-hero-title {
            font-size: 42px;
            line-height: 1.1;
            font-weight: 900;
            margin: 0;
        }

        .create-hero-text {
            max-width: 720px;
            margin-top: 16px;
            font-size: 15px;
            line-height: 1.8;
            color: #dbeafe;
        }

        .create-hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .btn-primary-white {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #ffffff;
            color: #0f172a;
            padding: 13px 18px;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            border: 0;
            cursor: pointer;
            box-shadow: 0 12px 28px rgba(255, 255, 255, 0.16);
        }

        .btn-secondary-dark {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
            padding: 13px 18px;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.22);
            cursor: pointer;
        }

        .create-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 340px;
            gap: 24px;
            align-items: start;
        }

        .form-card,
        .side-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 26px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            overflow: hidden;
        }

        .form-header {
            padding: 26px 30px;
            border-bottom: 1px solid #e2e8f0;
        }

        .step-label {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: #2563eb;
            margin-bottom: 8px;
        }

        .form-title {
            font-size: 26px;
            font-weight: 900;
            color: #0f172a;
            margin: 0;
        }

        .form-subtitle {
            margin-top: 8px;
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        .form-body {
            padding: 30px;
        }

        .field-group {
            margin-bottom: 22px;
        }

        .field-label {
            display: block;
            font-size: 14px;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .required {
            color: #ef4444;
        }

        .field-input,
        .field-textarea {
            width: 100%;
            border: 1px solid #cbd5e1;
            background: #f8fafc;
            border-radius: 16px;
            padding: 14px 16px;
            font-size: 14px;
            color: #0f172a;
            outline: none;
            transition: all 160ms ease;
            box-sizing: border-box;
        }

        .field-textarea {
            resize: vertical;
            line-height: 1.7;
        }

        .field-input:focus,
        .field-textarea:focus {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .field-help {
            margin-top: 8px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
        }

        .error-text {
            display: block;
            margin-top: 8px;
            color: #dc2626;
            font-size: 13px;
            font-weight: 700;
        }

        .two-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-footer {
            border-top: 1px solid #e2e8f0;
            background: #f8fafc;
            padding: 22px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .footer-note {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .footer-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #ffffff;
            color: #334155;
            padding: 13px 18px;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            border: 1px solid #cbd5e1;
            cursor: pointer;
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #2563eb;
            color: #ffffff;
            padding: 13px 20px;
            font-size: 14px;
            font-weight: 900;
            text-decoration: none;
            border: 0;
            cursor: pointer;
            box-shadow: 0 14px 28px rgba(37, 99, 235, 0.24);
        }

        .side-card {
            padding: 24px;
            margin-bottom: 20px;
        }

        .side-label {
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: #2563eb;
            margin-bottom: 12px;
        }

        .side-title {
            font-size: 20px;
            font-weight: 900;
            color: #0f172a;
            margin: 0 0 16px;
        }

        .side-section {
            margin-top: 16px;
        }

        .side-section strong {
            display: block;
            color: #0f172a;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .side-section p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
        }

        .success-alert {
            margin-bottom: 20px;
            border: 1px solid #bbf7d0;
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 700;
        }
                .btn-primary-white,
        .btn-secondary-dark,
        .btn-cancel,
        .btn-submit {
            position: relative;
            overflow: hidden;
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

        .btn-primary-white::before,
        .btn-secondary-dark::before,
        .btn-cancel::before,
        .btn-submit::before {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 80%;
            height: 100%;
            background: linear-gradient(
                120deg,
                transparent 0%,
                rgba(255, 255, 255, 0.45) 50%,
                transparent 100%
            );
            transition: left 520ms ease;
            pointer-events: none;
        }

        .btn-primary-white:hover,
        .btn-secondary-dark:hover,
        .btn-cancel:hover,
        .btn-submit:hover {
            transform: translateY(-3px) scale(1.015);
            filter: brightness(1.03);
        }

        .btn-primary-white:hover::before,
        .btn-secondary-dark:hover::before,
        .btn-cancel:hover::before,
        .btn-submit:hover::before {
            left: 130%;
        }

        .btn-primary-white:active,
        .btn-secondary-dark:active,
        .btn-cancel:active,
        .btn-submit:active {
            transform: translateY(1px) scale(0.985);
            filter: brightness(0.96);
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.18);
        }

        .btn-primary-white:focus-visible,
        .btn-secondary-dark:focus-visible,
        .btn-cancel:focus-visible,
        .btn-submit:focus-visible {
            outline: none;
            box-shadow:
                0 0 0 4px rgba(37, 99, 235, 0.18),
                0 18px 35px rgba(15, 23, 42, 0.22);
        }

        .btn-primary-white:hover {
            background: #eff6ff;
            box-shadow: 0 18px 35px rgba(255, 255, 255, 0.22);
        }

        .btn-secondary-dark:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.38);
            box-shadow: 0 18px 35px rgba(15, 23, 42, 0.2);
        }

        .btn-cancel:hover {
            border-color: #94a3b8;
            color: #0f172a;
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.1);
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 55%, #1e40af 100%);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.32);
        }
        @media (max-width: 980px) {
            .create-grid {
                grid-template-columns: 1fr;
            }

            .create-hero-title {
                font-size: 34px;
            }

            .two-cols {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="create-page-wrap">
        <div class="create-page-container">
            <section class="create-hero">
                <div class="create-hero-label">Product Brief Builder</div>

                <h1 class="create-hero-title">Create Sales Page</h1>

                <p class="create-hero-text">
                    Add your product details once, save it as a draft, then generate a polished sales page with headline, benefits, pricing copy, and a clear call-to-action.
                </p>

                <div class="create-hero-actions">
                    <button type="submit" form="sales-page-form" class="btn-primary-white">
                        Save Draft & Preview
                    </button>

                    <a href="{{ route('sales-pages.index') }}" class="btn-secondary-dark">
                        View Saved Pages
                    </a>
                </div>
            </section>

            @if (session()->has('success'))
                <div class="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="create-grid">
                <form id="sales-page-form" wire:submit.prevent="saveDraft" class="form-card">
                    <div class="form-header">
                        <div class="step-label">Step 01</div>
                        <h2 class="form-title">Product Information</h2>
                        <p class="form-subtitle">
                            Use clear and specific product details. Better input produces better sales copy..
                        </p>
                    </div>

                    <div class="form-body">
                        <div class="field-group">
                            <label class="field-label">
                                Product / Service Name <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                wire:model="product_name"
                                placeholder="Example: Smart Quran Speaker"
                                class="field-input"
                            >

                            @error('product_name')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field-group">
                            <label class="field-label">
                                Description <span class="required">*</span>
                            </label>

                            <textarea
                                wire:model="description"
                                rows="4"
                                placeholder="Describe what the product does, who it helps, and why it matters."
                                class="field-textarea"
                            ></textarea>

                            @error('description')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field-group">
                            <label class="field-label">Key Features</label>

                            <textarea
                                wire:model="features"
                                rows="3"
                                placeholder="Example: Clear audio, remote control, multilingual support, rechargeable battery"
                                class="field-textarea"
                            ></textarea>

                            <div class="field-help">
                                Separate features with commas for cleaner AI output.
                            </div>
                        </div>

                        <div class="two-cols">
                            <div class="field-group">
                                <label class="field-label">Target Audience</label>

                                <input
                                    type="text"
                                    wire:model="target_audience"
                                    placeholder="Example: Muslim families, students, elderly users"
                                    class="field-input"
                                >
                            </div>

                            <div class="field-group">
                                <label class="field-label">Price</label>

                                <input
                                    type="text"
                                    wire:model="price"
                                    placeholder="Example: Rp799000"
                                    class="field-input"
                                >
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Unique Selling Points</label>

                            <textarea
                                wire:model="unique_selling_points"
                                rows="3"
                                placeholder="Example: Easy to use, Islamic content, suitable for home and gift"
                                class="field-textarea"
                            ></textarea>
                        </div>
                    </div>

                    <div class="form-footer">
                        <div class="footer-note">
                            After saving, you will be redirected to the preview page to generate AI copy.
                        </div>

                        <div class="footer-actions">
                            <a href="{{ route('sales-pages.index') }}" class="btn-cancel">
                                Cancel
                            </a>

                            <button type="submit" class="btn-submit">
                                Save Draft & Preview
                            </button>
                        </div>
                    </div>
                </form>

                <aside>
                    <div class="side-card">
                        <div class="side-label">Example Input</div>
                        <h3 class="side-title">Smart Quran Speaker</h3>

                        <div class="side-section">
                            <strong>Description</strong>
                            <p>Portable speaker with Quran recitation, translation, and Bluetooth support.</p>
                        </div>

                        <div class="side-section">
                            <strong>Features</strong>
                            <p>Clear audio, remote control, multilingual support, rechargeable battery.</p>
                        </div>

                        <div class="side-section">
                            <strong>Audience</strong>
                            <p>Muslim families, students, elderly users.</p>
                        </div>
                    </div>

                    <div class="side-card">
                        <div class="side-label">Submission Quality Tip</div>
                        <h3 class="side-title">Use realistic product data</h3>

                        <div class="side-section">
                            <p>
                                Avoid dummy numeric text. Realistic inputs help produce a more convincing headline, benefits, pricing copy, and call-to-action.
                            </p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>