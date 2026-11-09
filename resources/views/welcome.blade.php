<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#f6f7fb">
        <title>VisitorChed</title>
        <style>
            :root {
                color-scheme: light;
                --ink: #17233b;
                --muted: #667085;
                --accent: #7357c8;
                --accent-dark: #5f45b2;
                --accent-soft: #f0edfa;
                --line: #e7e9ef;
                --surface: #ffffff;
                --canvas: #f6f7fb;
            }

            * {
                box-sizing: border-box;
            }

            body {
                min-height: 100vh;
                margin: 0;
                background: var(--canvas);
                color: var(--ink);
                font-family: "Instrument Sans", "Segoe UI", Arial, sans-serif;
                -webkit-font-smoothing: antialiased;
            }

            a {
                color: inherit;
            }

            .page-shell {
                width: min(1160px, calc(100% - 48px));
                margin: 0 auto;
                padding: 28px 0 64px;
            }

            .site-nav {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 24px;
                padding: 0 4px;
                margin-bottom: 30px;
            }

            .brand {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                color: var(--ink);
                font-size: 1.08rem;
                font-weight: 700;
                letter-spacing: -0.02em;
                text-decoration: none;
            }

            .brand-mark {
                display: grid;
                width: 40px;
                height: 40px;
                place-items: center;
                border-radius: 12px;
                background: var(--ink);
                color: #fff;
                font-size: 1rem;
                font-weight: 700;
            }

            .nav-links {
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .nav-links a {
                padding: 10px 14px;
                border-radius: 9px;
                color: #475467;
                font-size: 0.92rem;
                font-weight: 600;
                text-decoration: none;
                transition: background-color 160ms ease, color 160ms ease;
            }

            .nav-links a:hover {
                background: #eceef4;
                color: var(--ink);
            }

            .nav-links .nav-primary {
                background: var(--ink);
                color: #fff;
            }

            .nav-links .nav-primary:hover {
                background: #253653;
                color: #fff;
            }

            .hero {
                overflow: hidden;
                border: 1px solid var(--line);
                border-radius: 22px;
                background: var(--surface);
                box-shadow: 0 18px 48px rgba(23, 35, 59, 0.06);
            }

            .hero-content {
                display: grid;
                grid-template-columns: minmax(0, 1.15fr) minmax(300px, 0.85fr);
                align-items: center;
                gap: clamp(32px, 7vw, 88px);
                padding: clamp(36px, 7vw, 84px);
            }

            .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 9px;
                margin-bottom: 22px;
                color: var(--accent-dark);
                font-size: 0.76rem;
                font-weight: 700;
                letter-spacing: 0.1em;
                text-transform: uppercase;
            }

            .eyebrow::before {
                width: 7px;
                height: 7px;
                border-radius: 50%;
                background: #a38ce9;
                content: "";
            }

            h1 {
                max-width: 650px;
                margin: 0;
                color: var(--ink);
                font-size: clamp(2.5rem, 5vw, 4.25rem);
                font-weight: 650;
                letter-spacing: -0.055em;
                line-height: 1.08;
            }

            .lead {
                max-width: 570px;
                margin: 22px 0 30px;
                color: var(--muted);
                font-size: 1.08rem;
                line-height: 1.75;
            }

            .cta-row {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 12px;
            }

            .btn {
                display: inline-flex;
                min-height: 46px;
                align-items: center;
                justify-content: center;
                padding: 0 18px;
                border: 1px solid transparent;
                border-radius: 9px;
                font-size: 0.92rem;
                font-weight: 650;
                text-decoration: none;
                transition: background-color 160ms ease, border-color 160ms ease, transform 160ms ease;
            }

            .btn:hover {
                transform: translateY(-1px);
            }

            .btn-primary {
                background: var(--accent);
                color: #fff;
            }

            .btn-primary:hover {
                background: var(--accent-dark);
            }

            .btn-secondary {
                border-color: var(--line);
                background: #fff;
                color: #344054;
            }

            .btn-secondary:hover {
                border-color: #cfd3df;
                background: #fafbfc;
            }

            .overview-card {
                padding: 28px;
                border: 1px solid #e6e1f3;
                border-radius: 16px;
                background: linear-gradient(155deg, #f8f6fd 0%, #fff 75%);
            }

            .card-kicker {
                margin: 0 0 11px;
                color: var(--accent-dark);
                font-size: 0.74rem;
                font-weight: 700;
                letter-spacing: 0.09em;
                text-transform: uppercase;
            }

            .overview-card h2 {
                margin: 0;
                color: var(--ink);
                font-size: 1.45rem;
                font-weight: 650;
                letter-spacing: -0.03em;
                line-height: 1.3;
            }

            .card-copy {
                margin: 10px 0 24px;
                color: var(--muted);
                font-size: 0.93rem;
                line-height: 1.65;
            }

            .feature-list {
                display: grid;
                gap: 0;
                padding: 0;
                margin: 0;
                list-style: none;
            }

            .feature-list li {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 14px 0;
                border-top: 1px solid #e9e7ef;
                color: #344054;
                font-size: 0.9rem;
                font-weight: 550;
            }

            .feature-number {
                display: grid;
                width: 27px;
                height: 27px;
                flex: 0 0 27px;
                place-items: center;
                border-radius: 8px;
                background: var(--accent-soft);
                color: var(--accent-dark);
                font-size: 0.72rem;
                font-weight: 700;
            }

            a:focus-visible {
                outline: 3px solid #b7a8ec;
                outline-offset: 3px;
            }

            @media (max-width: 760px) {
                .page-shell {
                    width: min(100% - 32px, 560px);
                    padding-top: 18px;
                }

                .site-nav {
                    margin-bottom: 18px;
                }

                .hero-content {
                    grid-template-columns: 1fr;
                    gap: 36px;
                    padding: 36px 28px;
                }
            }

            @media (max-width: 480px) {
                .site-nav {
                    align-items: flex-start;
                    flex-direction: column;
                    gap: 14px;
                }

                .nav-links {
                    width: 100%;
                }

                .nav-links a {
                    padding: 9px 11px;
                }

                .nav-links .nav-primary {
                    margin-left: auto;
                }

                .hero-content {
                    padding: 30px 22px;
                }

                h1 {
                    font-size: 2.55rem;
                }

                .overview-card {
                    padding: 22px;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                *,
                *::before,
                *::after {
                    scroll-behavior: auto !important;
                    transition-duration: 0.01ms !important;
                }
            }
        </style>
    </head>
    <body>
        <div class="page-shell">
            <header class="site-nav">
                <a class="brand" href="{{ url('/') }}" aria-label="VisitorChed home">
                    <span class="brand-mark" aria-hidden="true">V</span>
                    <span>VisitorChed</span>
                </a>

                <nav class="nav-links" aria-label="Main navigation">
                    <a href="{{ route('visitors.index') }}">Visitors</a>
                    <a class="nav-primary" href="{{ route('visitors.create') }}">Add visitor</a>
                </nav>
            </header>

            <main class="hero">
                <div class="hero-content">
                    <section>
                        <span class="eyebrow">Visitor management, made simple</span>
                        <h1>A more welcoming way to manage every visit.</h1>
                        <p class="lead">
                            Keep visitor information organized and easy to find. VisitorChed gives your team a clear, dependable place to manage guest records.
                        </p>

                        <div class="cta-row">
                            <a href="{{ route('visitors.index') }}" class="btn btn-primary">View visitor records</a>
                            <a href="{{ route('visitors.create') }}" class="btn btn-secondary">Register a visitor</a>
                        </div>
                    </section>

                    <aside class="overview-card" aria-labelledby="overview-title">
                        <p class="card-kicker">A clearer front desk</p>
                        <h2 id="overview-title">Everything you need to stay organized.</h2>
                        <p class="card-copy">
                            A straightforward workflow keeps visitor details accessible from registration through follow-up.
                        </p>

                        <ul class="feature-list">
                            <li><span class="feature-number">01</span> Create clear visitor records</li>
                            <li><span class="feature-number">02</span> Review and update details</li>
                            <li><span class="feature-number">03</span> Find information when it matters</li>
                        </ul>
                    </aside>
                </div>
            </main>
        </div>
    </body>
</html>
