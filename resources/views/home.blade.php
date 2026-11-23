@extends('layouts.mealup')

@section('title', 'Home')

@push('styles')
    <style>
        .mealup-main .home-wrap {
            max-width: 1160px;
            margin: 0 auto;
        }

        /* 1. WELCOME CHEF SPLIT */
        .mealup-main .home-welcome-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 32px;
            align-items: center;
        }

        @media (min-width: 1024px) {
            .mealup-main .home-welcome-grid {
                grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
                gap: 40px;
            }
        }

        .mealup-main .home-welcome-kicker {
            margin: 0;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #b06800;
        }

        .mealup-main h1.home-welcome-title {
            margin: 6px 0 0;
            font-size: clamp(2.1rem, 3.6vw, 3rem);
            font-weight: 800;
            color: #43271b;
            line-height: 1.1;
            letter-spacing: -0.025em;
        }

        .mealup-main .home-welcome-desc {
            margin: 14px 0 0;
            max-width: 520px;
            font-size: 0.975rem;
            line-height: 1.65;
            color: #5a4a42;
        }

        .mealup-main .home-welcome-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            margin-top: 22px;
        }

        .mealup-main .home-pantry-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 12px;
            background: #43271b;
            color: #fff;
            font-size: 0.875rem;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 8px 18px rgb(59 32 16 / 14%);
            transition: transform 160ms ease, background-color 160ms ease;
        }

        .mealup-main .home-pantry-btn:hover {
            transform: translateY(-2px);
            background: #b06800;
        }

        .mealup-main .home-secondary-link {
            padding: 11px 16px;
            border: 1px solid #eadcc9;
            border-radius: 12px;
            background: #fff;
            color: #43271b;
            font-size: 0.875rem;
            font-weight: 700;
            text-decoration: none;
            transition: border-color 150ms ease, background-color 150ms ease;
        }

        .mealup-main .home-secondary-link:hover {
            border-color: #b06800;
            background: #faf2e3;
        }

        /* Susunan Foto Utama + 3 Doodle Menimpa di Atasnya */
        .mealup-main .home-visual-stage {
            position: relative;
            padding: 18px;
            margin: 10px 6px;
        }

        .mealup-main .home-visual-main-img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 22px;
            border: 1px solid #eadcc9;
            box-shadow: 0 14px 30px rgb(59 32 16 / 12%);
            display: block;
        }

        .mealup-main .home-doodle-overlay {
            position: absolute;
            pointer-events: none;
            object-fit: contain;
            filter: drop-shadow(0 6px 12px rgb(47 25 16 / 18%));
        }

       .mealup-main .doodle-top-left {
            top: -14px;
            left: -12px;
            width: 108px;
            height: 108px;
            transform: rotate(-24deg);
        }

        .mealup-main .doodle-center {
            top: 52%;
            left: 50%;
            width: 136px;
            height: 136px;
            transform: translate(-50%, -48%) rotate(-22deg);
        }

        .mealup-main .doodle-bottom-right {
            bottom: -14px;
            right: -10px;
            width: 108px;
            height: 108px;
            transform: rotate(24deg);
        }
        }

        /* 2. OUR PROMISE */
        .mealup-main h2.home-sec-title {
            margin: 0;
            font-size: clamp(1.35rem, 2.2vw, 1.75rem);
            font-weight: 800;
            color: #43271b;
        }

        .mealup-main .home-sec-sub {
            margin: 4px 0 0;
            font-size: 0.875rem;
            color: #6e6056;
        }

        .mealup-main .home-promise-section {
            margin-top: 48px;
        }

        .mealup-main .home-promise-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            margin-top: 18px;
        }

        @media (min-width: 1024px) {
            .mealup-main .home-promise-grid {
                grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
                align-items: start;
            }
        }

        .mealup-main .home-promise-box {
            padding: 20px;
            border: 1px solid #eadcc9;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 6px 20px rgb(59 32 16 / 5%);
        }

        .mealup-main .home-promise-kicker {
            margin: 0;
            font-size: 0.85rem;
            font-weight: 600;
            color: #b06800;
        }

        .mealup-main .home-mini-stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin-top: 16px;
        }

        .mealup-main .home-mini-stat {
            padding: 12px;
            border: 1px solid #f0e6d8;
            border-radius: 12px;
            background: #fbf7ee;
            text-align: center;
        }

        .mealup-main .home-mini-stat strong {
            display: block;
            font-size: 1rem;
            font-weight: 800;
            color: #43271b;
        }

        .mealup-main .home-mini-stat span {
            font-size: 0.7rem;
            font-weight: 700;
            color: #6e6056;
            text-transform: uppercase;
        }

        .mealup-main .home-ticket-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-top: 16px;
            padding: 16px;
            border-radius: 14px;
            background: #faf2e3;
            border: 1px dashed #b06800;
        }

        .mealup-main .home-ticket-card h3 {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 800;
            color: #43271b;
        }

        .mealup-main .home-ticket-card p {
            margin: 4px 0 0;
            font-size: 0.8rem;
            color: #5a4a42;
        }

        .mealup-main .home-cta-pill {
            flex-shrink: 0;
            padding: 8px 14px;
            border: 0;
            border-radius: 8px;
            background: #43271b;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
        }

        .mealup-main .home-cta-pill:hover {
            background: #b06800;
        }

        .mealup-main .home-photo-mosaic {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .mealup-main .home-photo-mosaic img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 14px;
            border: 1px solid #eadcc9;
            background: #fff;
        }

        /* 3. BIFEST SHOWCASE EVENT (TANPA GAMBAR) */
        .mealup-main .home-event-section {
            margin-top: 48px;
        }

        .mealup-main .home-event-card {
            margin-top: 16px;
            padding: 26px 28px;
            border: 1px solid #eadcc9;
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 8px 24px rgb(59 32 16 / 6%);
        }

        .mealup-main .home-event-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            background: #fff0cd;
            color: #714500;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .mealup-main .home-event-title {
            margin: 10px 0 0;
            font-size: clamp(1.5rem, 2.6vw, 2rem);
            font-weight: 800;
            color: #43271b;
            line-height: 1.15;
        }

        .mealup-main .home-event-meta-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            margin-top: 20px;
        }

        @media (min-width: 640px) {
            .mealup-main .home-event-meta-list {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .mealup-main .home-event-chip {
            padding: 14px 16px;
            border: 1px solid #f0e6d8;
            border-radius: 12px;
            background: #fbf7ee;
        }

        .mealup-main .home-event-chip small {
            display: block;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #6e6056;
        }

        .mealup-main .home-event-chip strong {
            display: block;
            margin-top: 4px;
            font-size: 0.92rem;
            font-weight: 800;
            color: #43271b;
        }

        .mealup-main .home-banner-strip {
            margin-top: 38px;
            padding: 18px 22px;
            border-radius: 14px;
            background: #43271b;
            color: #fff;
            text-align: center;
            font-weight: 700;
            font-size: 0.95rem;
        }

        /* 4. FOOTER */
        footer.landing-style-footer {
            width: 100%;
            margin-top: auto;
            background: #2f1910;
            color: #fff;
            padding: 48px 36px 32px;
        }

        .landing-footer-inner {
            max-width: 1152px;
            margin: 0 auto;
        }

        .landing-footer-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 32px;
            font-size: 0.75rem;
        }

        @media (min-width: 768px) {
            .landing-footer-grid {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }
        }

        .landing-footer-brand {
            grid-column: span 2 / span 2;
        }

        @media (min-width: 768px) {
            .landing-footer-brand {
                grid-column: span 1 / span 1;
            }
        }

        .landing-footer-grid h3 {
            margin: 0;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #fcd34d;
        }

        .landing-footer-grid ul {
            list-style: none;
            margin: 12px 0 0;
            padding: 0;
            display: grid;
            gap: 8px;
        }

        .landing-footer-grid a {
            color: rgb(254 243 199 / 80%);
            text-decoration: none;
        }

        .landing-footer-grid a:hover {
            color: #fff;
        }

        .landing-footer-bottom {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-top: 40px;
            padding-top: 24px;
            border-top: 1px solid rgb(255 255 255 / 10%);
            font-size: 0.75rem;
            color: rgb(254 243 199 / 60%);
        }

        @media (min-width: 640px) {
            .landing-footer-bottom {
                flex-direction: row;
            }
        }

        .home-modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 50;
            display: none;
            place-items: center;
            padding: 0 20px;
            background: rgb(0 0 0 / 60%);
            backdrop-filter: blur(4px);
        }

        .home-modal-backdrop.is-open {
            display: grid;
        }

        .home-modal-card {
            position: relative;
            width: 100%;
            max-width: 600px;
            max-height: calc(100vh - 48px);
            padding: 28px;
            overflow-y: auto;
            border-radius: 18px;
            background: #fbf7ee;
            color: #43271b;
            box-shadow: 0 25px 50px -12px rgb(0 0 0 / 25%);
        }

        .home-modal-close {
            position: absolute;
            top: 14px;
            right: 16px;
            width: 34px;
            height: 34px;
            border: 0;
            border-radius: 999px;
            background: #eadcc9;
            color: #43271b;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <div class="home-wrap">
       <!-- 1. WELCOME CHEF (KIRI: TEKS & 1 TOMBOL PANTRY | KANAN: FOTO & 3 DOODLE MENYAMPING) -->
        <section class="home-welcome-grid">
            <div>
                <p class="home-welcome-kicker">Your Kitchen Workspace</p>
                <h1 class="home-welcome-title">Welcome, Chef</h1>
                <p class="home-welcome-desc">
                    Ready to turn everyday ingredients into practical meals? Check what is sitting in your pantry, keep track of freshness, and cook without unnecessary waste.
                </p>

                <div class="home-welcome-actions">
                    <a href="{{ url('/pantry') }}" class="home-pantry-btn">
                        Go to Pantry &rarr;
                    </a>
                </div>
            </div>

            <div class="home-visual-stage">
                <img
                    src="{{ asset('assets/images (4).jpeg') }}"
                    alt="Fresh ingredients and pantry staples"
                    class="home-visual-main-img"
                />
                <img
                    src="{{ asset('assets/garlicdoodle.png') }}"
                    alt=""
                    aria-hidden="true"
                    class="home-doodle-overlay doodle-top-left"
                />
                <img
                    src="{{ asset('assets/tomatodoodle.png') }}"
                    alt=""
                    aria-hidden="true"
                    class="home-doodle-overlay doodle-center"
                />
                <img
                    src="{{ asset('assets/avocadodoodle.png') }}"
                    alt=""
                    aria-hidden="true"
                    class="home-doodle-overlay doodle-bottom-right"
                />
            </div>
        </section>

        <!-- 2. OUR PROMISE -->
        <section class="home-promise-section">
            <h2 class="home-sec-title">Our Promise</h2>
            <p class="home-sec-sub">Less food waste, faster meal decisions every day.</p>

            <div class="home-promise-grid">
                <div>
                    <div class="home-promise-box">
                        <p class="home-promise-kicker">Smart pantry habits — simple &amp; practical</p>

                        <div class="home-mini-stats">
                            <div class="home-mini-stat">
                                <strong>Zero Waste</strong>
                                <span>Expiry Alerts</span>
                            </div>
                            <div class="home-mini-stat">
                                <strong>100% Match</strong>
                                <span>Ready Recipes</span>
                            </div>
                            <div class="home-mini-stat">
                                <strong>Quick Log</strong>
                                <span>Add &amp; Edit</span>
                            </div>
                            <div class="home-mini-stat">
                                <strong>Kost Ready</strong>
                                <span>Budget Friendly</span>
                            </div>
                        </div>
                    </div>

                    <div class="home-ticket-card">
                        <div>
                            <h3>QUICK RECIPE MATCH</h3>
                            <p>Check ingredients in your pantry and see what you can cook right now.</p>
                        </div>
                        <button type="button" onclick="openDialog('recipes')" class="home-cta-pill">
                            Find Recipes
                        </button>
                    </div>
                </div>

                <div class="home-photo-mosaic">
                    <img src="{{ asset('assets/2aef4.png') }}" alt="Fresh pantry ingredients" />
                    <img src="{{ asset('assets/7311b.png') }}" alt="Homemade meal prep" />
                    <img src="{{ asset('assets/c6596.png') }}" alt="Healthy ingredients" />
                    <img src="{{ asset('assets/a77d2.png') }}" alt="Dish ready to serve" />
                </div>
            </div>
        </section>

        <!-- 3. EVENT SHOWCASE: BIFEST (TANPA GAMBAR) -->
        <section class="home-event-section">
            <h2 class="home-sec-title">Showcase Event</h2>
            <p class="home-sec-sub">Meet the Meal Up team and try the live web showcase in person.</p>

            <div class="home-event-card">
                <span class="home-event-badge">Live Web Showcase</span>
                <h3 class="home-event-title">See you soon at BIFEST!</h3>
                <p class="home-welcome-desc" style="margin-top: 10px; max-width: 680px; font-size: 0.92rem;">
                    Come visit our booth to explore how Meal Up helps you track pantry ingredients and match recipes effortlessly.
                </p>

                <div class="home-event-meta-list">
                    <div class="home-event-chip">
                        <small>Date</small>
                        <strong>24 November</strong>
                    </div>
                    <div class="home-event-chip">
                        <small>Location</small>
                        <strong>Gerai Binusian</strong>
                    </div>
                    <div class="home-event-chip">
                        <small>Time</small>
                        <strong>1 PM - 4 PM</strong>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. BANNER STRIP -->
        <div class="home-banner-strip">
            Meal Up — Track Your Pantry Stock &amp; Cook What You Already Have
        </div>
    </div>

    <div id="appModal" class="home-modal-backdrop">
        <div class="home-modal-card">
            <button type="button" onclick="closeDialog()" class="home-modal-close" aria-label="Tutup popup">
                &times;
            </button>
            <div id="modalContent"></div>
        </div>
    </div>

    <script>
        function openDialog(type) {
            const modal = document.getElementById('appModal');
            const content = document.getElementById('modalContent');

            if (type === 'recipes') {
                content.innerHTML = `
                    <span style="color:#b06800;font-weight:700;font-size:12px;letter-spacing:0.1em;text-transform:uppercase;">Recipe Match</span>
                    <h2 style="margin:4px 0 16px;font-size:26px;font-weight:800;color:#43271b;">Ready With Your Pantry</h2>
                    <p style="font-size:14px;color:#5a4a42;margin:0 0 16px;">Select your checked ingredients in Pantry to see matching recipes right away.</p>
                    <div style="display:grid;gap:10px;">
                        <div style="background:#fff;padding:12px 14px;border-radius:12px;border:1px solid #eadcc9;">
                            <strong>Quick Pantry Stir-Fry</strong>
                            <div style="font-size:12px;color:#6e6056;margin-top:2px;">Use expiring veggies &amp; protein • ~15 mins</div>
                        </div>
                        <div style="background:#fff;padding:12px 14px;border-radius:12px;border:1px solid #eadcc9;">
                            <strong>Fresh Herb &amp; Pantry Bowl</strong>
                            <div style="font-size:12px;color:#6e6056;margin-top:2px;">Simple everyday ingredients • ~10 mins</div>
                        </div>
                    </div>
                    <a href="{{ url('/pantry') }}" style="display:block;text-align:center;text-decoration:none;margin-top:20px;padding:11px;border-radius:10px;background:#43271b;color:#fff;font-weight:700;">
                        Go to Pantry &amp; Select Ingredients →
                    </a>
                `;
            }

            modal.classList.add('is-open');
        }

        function closeDialog() {
            document.getElementById('appModal').classList.remove('is-open');
        }

        window.addEventListener('click', function (event) {
            const modal = document.getElementById('appModal');
            if (event.target === modal) {
                closeDialog();
            }
        });
    </script>
@endsection

@section('footer')
    <!-- 5. FOOTER -->
    <footer id="contact" class="landing-style-footer">
        <div class="landing-footer-inner">
            <div class="landing-footer-grid">
                <div class="landing-footer-brand">
                    <img src="{{ asset('assets/52a41.png') }}" alt="Meal Up" style="height: auto; width: 144px;" />
                    <p style="margin: 12px 0 0; color: rgb(254 243 199 / 70%);">Cook less, waste less with smart ingredient tracking.</p>
                </div>

                <div>
                    <h3>About</h3>
                    <ul>
                        <li><a href="{{ url('/#about') }}">Our Mission</a></li>
                        <li><a href="{{ url('/#features') }}">Features</a></li>
                        <li><a href="{{ url('/#faq') }}">FAQs</a></li>
                    </ul>
                </div>

                <div>
                    <h3>Pages</h3>
                    <ul>
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ url('/pantry') }}">Pantry</a></li>
                        <li><a href="{{ url('/recipes') }}">Recipes</a></li>
                    </ul>
                </div>

                <div>
                    <h3>Account</h3>
                    <ul>
                        <li><a href="{{ url('/home') }}">Sign in</a></li>
                        <li><a href="{{ url('/home') }}">Sign up</a></li>
                    </ul>
                </div>

                <div>
                    <h3>Contact</h3>
                    <ul>
                        <li><a href="mailto:mealup@gmail.com">mealup@gmail.com</a></li>
                    </ul>
                    <img src="{{ asset('assets/c65f1.png') }}" alt="Social media" style="margin-top: 12px; height: auto; width: 112px;" />
                </div>
            </div>

            <div class="landing-footer-bottom">
                <img src="{{ asset('assets/3217c.png') }}" alt="© Meal Up" style="height: auto; width: 144px; opacity: 0.8;" />
                <span>&copy; {{ date('Y') }} Meal Up. All rights reserved.</span>
            </div>
        </div>
    </footer>
@endsection