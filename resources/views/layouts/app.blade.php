<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f7fb">
    <title>@yield('title') - VisitorChed</title>

    <style>
        :root {
            color-scheme: light;
            --ink: #17233b;
            --muted: #667085;
            --accent: #7357c8;
            --accent-dark: #5f45b2;
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

        .site-header {
            border-bottom: 1px solid var(--line);
            background: var(--surface);
        }

        .brand-row {
            display: flex;
            width: min(1120px, calc(100% - 48px));
            min-height: 76px;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            margin: 0 auto;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: var(--ink);
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            text-decoration: none;
        }

        .brand-badge {
            display: grid;
            width: 38px;
            height: 38px;
            place-items: center;
            border-radius: 11px;
            background: var(--ink);
            color: #fff;
            font-size: 0.95rem;
            font-weight: 700;
        }

        .header-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .header-links a {
            padding: 9px 13px;
            border-radius: 8px;
            color: #475467;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 160ms ease, color 160ms ease;
        }

        .header-links a:hover {
            background: #f1f2f6;
            color: var(--ink);
        }

        .header-links .header-primary {
            background: var(--ink);
            color: #fff;
        }

        .header-links .header-primary:hover {
            background: #253653;
            color: #fff;
        }

        main {
            width: min(1120px, calc(100% - 48px));
            margin: 36px auto 64px;
        }

        .container {
            padding: clamp(24px, 4vw, 40px);
            border: 1px solid var(--line);
            border-radius: 16px;
            background: var(--surface);
            box-shadow: 0 12px 32px rgba(23, 35, 59, 0.045);
        }

        h1 {
            margin: 0 0 8px;
            color: var(--ink);
            font-size: clamp(1.75rem, 3vw, 2.25rem);
            font-weight: 650;
            letter-spacing: -0.04em;
        }

        p {
            color: var(--muted);
            line-height: 1.65;
        }

        .container > p {
            margin: 0 0 24px;
        }

        .btn {
            display: inline-flex;
            min-height: 40px;
            align-items: center;
            justify-content: center;
            padding: 0 14px;
            border: 1px solid transparent;
            border-radius: 8px;
            cursor: pointer;
            font: inherit;
            font-size: 0.88rem;
            font-weight: 650;
            text-decoration: none;
            transition: background-color 160ms ease, border-color 160ms ease, transform 160ms ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .primary {
            background: var(--accent);
            color: #fff;
        }

        .primary:hover {
            background: var(--accent-dark);
        }

        .secondary {
            border-color: var(--line);
            background: #fff;
            color: #344054;
        }

        .secondary:hover {
            border-color: #cfd3df;
            background: #fafbfc;
        }

        .danger {
            border-color: #f1d0d5;
            background: #fff7f7;
            color: #b42335;
        }

        .danger:hover {
            background: #feeeee;
        }

        .warning {
            border-color: #f2dfb6;
            background: #fffbf1;
            color: #8a5a12;
        }

        .warning:hover {
            background: #fff5dd;
        }

        .table-wrap {
            overflow-x: auto;
            margin-top: 22px;
            border: 1px solid var(--line);
            border-radius: 11px;
        }

        table {
            width: 100%;
            min-width: 700px;
            border-collapse: collapse;
            background: var(--surface);
        }

        th,
        td {
            padding: 14px 16px;
            border-bottom: 1px solid #eef0f4;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #f8f9fc;
            color: #475467;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        td {
            color: #344054;
            font-size: 0.9rem;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        tbody tr:hover {
            background: #fafbfe;
        }

        input {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 10px 12px;
            margin-top: 8px;
            border: 1px solid #d5d9e2;
            border-radius: 8px;
            background: #fff;
            color: var(--ink);
            font: inherit;
            font-size: 0.95rem;
            transition: border-color 160ms ease, box-shadow 160ms ease;
        }

        input::placeholder {
            color: #98a2b3;
        }

        input:focus {
            border-color: var(--accent);
            outline: 0;
            box-shadow: 0 0 0 3px rgba(115, 87, 200, 0.15);
        }

        label {
            display: block;
            margin-top: 18px;
            color: #344054;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .alert {
            padding: 13px 15px;
            margin-bottom: 20px;
            border: 1px solid #b7e4ca;
            border-radius: 9px;
            background: #f1fbf4;
            color: #17663b;
            font-size: 0.92rem;
            font-weight: 550;
        }

        .error {
            margin-top: 7px;
            color: #b42335;
            font-size: 0.83rem;
            font-weight: 550;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        form {
            margin-top: 22px;
        }

        .actions form {
            margin: 0;
        }

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid #b7a8ec;
            outline-offset: 3px;
        }

        @media (max-width: 640px) {
            .brand-row,
            main {
                width: min(100% - 32px, 560px);
            }

            .brand-row {
                min-height: 68px;
            }

            main {
                margin-top: 22px;
            }

            .header-links {
                gap: 2px;
            }

            .header-links a {
                padding: 8px 9px;
                font-size: 0.82rem;
            }

            .actions {
                gap: 6px;
            }
        }

        @media (max-width: 400px) {
            .brand-row {
                align-items: flex-start;
                flex-direction: column;
                justify-content: center;
                gap: 12px;
                padding: 12px 0;
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

<header class="site-header">
    <div class="brand-row">
        <a class="brand" href="{{ url('/') }}" aria-label="VisitorChed home">
            <span class="brand-badge" aria-hidden="true">V</span>
            <span>VisitorChed</span>
        </a>
        <nav class="header-links" aria-label="Main navigation">
            <a href="{{ route('visitors.index') }}">Visitors</a>
            <a class="header-primary" href="{{ route('visitors.create') }}">Add visitor</a>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

</body>
</html>
