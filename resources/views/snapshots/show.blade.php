<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snapshot: {{ $label }} — Iran War Cost Tracker</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0a0a08;
            --white: #f0f0f0;
            --gray: #e8e0d0;
            --red: #c0392b;
            --border: #2a2a28;
            --box-bg: #111110;
            --label: #cccccc;
            --label-dim: #aaaaaa;
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: var(--bg);
            color: var(--white);
            font-family: 'DM Mono', monospace;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            opacity: 0.04; pointer-events: none; z-index: 1;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            background-repeat: repeat; background-size: 256px 256px;
        }

        body::after {
            content: '';
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(ellipse at center, transparent 40%, rgba(0,0,0,0.6) 100%);
            pointer-events: none; z-index: 1;
        }

        .content {
            position: relative; z-index: 2;
            text-align: center;
            padding: 2rem 1rem 6rem;
            max-width: 700px; width: 100%;
        }

        .back-link {
            display: inline-block;
            font-size: 0.7rem; letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--label-dim); text-decoration: none;
            margin-bottom: 2rem;
            transition: color 0.2s;
        }

        .back-link:hover { color: var(--white); }

        .snapshot-label {
            font-size: 0.7rem; letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--label-dim);
            margin-bottom: 0.25rem;
        }

        .snapshot-date-heading {
            font-size: 1.1rem; letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gray);
            margin-bottom: 1rem;
        }

        .frozen-notice {
            display: inline-block;
            font-size: 0.6rem; letter-spacing: 0.08em;
            color: var(--red);
            border: 1px solid var(--red);
            border-radius: 4px;
            padding: 0.3rem 0.8rem;
            margin-bottom: 2rem;
        }

        .frozen-counter {
            font-size: clamp(1.2rem, 6vw, 4rem);
            font-weight: 500;
            line-height: 1.1;
            color: var(--white);
            margin-bottom: 0.5rem;
        }

        .frozen-counter .dollar {
            color: var(--gray);
        }

        .frozen-short {
            font-size: 0.8rem;
            color: var(--label-dim);
            margin-bottom: 2.5rem;
        }

        .key-figures {
            max-width: 380px;
            margin: 0 auto 2.5rem;
            padding: 0.75rem 1rem;
            background: rgba(255,255,255,0.03);
            border: 1px solid var(--border);
            border-radius: 4px;
        }

        .key-figures-heading {
            font-size: 0.6rem; font-weight: 500;
            letter-spacing: 0.12em; text-transform: uppercase;
            color: var(--label-dim);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .key-figures-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.65rem; line-height: 1.9;
        }

        .key-figures-label { color: var(--label-dim); }
        .key-figures-value { color: var(--gray); }

        .nav-links {
            margin-bottom: 2rem;
        }

        .nav-links a {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            font-family: 'DM Mono', monospace;
            font-size: 0.6rem; letter-spacing: 0.1em;
            text-transform: uppercase;
            text-decoration: none;
            color: var(--gray);
            border: 1px solid var(--border);
            border-radius: 4px;
            background: var(--box-bg);
            margin: 0 0.25rem;
            transition: border-color 0.2s, color 0.2s;
        }

        .nav-links a:hover {
            color: var(--white);
            border-color: var(--gray);
        }

        .model-note {
            font-size: 0.6rem;
            color: var(--label-dim);
            letter-spacing: 0.04em;
        }

        .disclaimer {
            position: fixed; bottom: 0; left: 0; width: 100%;
            text-align: center;
            padding: 0.75rem 1rem 0.5rem;
            font-size: 0.55rem; letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--label-dim);
            background: linear-gradient(to top, var(--bg) 60%, transparent);
            z-index: 3;
        }

        .credit {
            text-align: center;
            font-size: 0.55rem; letter-spacing: 0.08em;
            color: var(--label-dim);
            padding-bottom: 0.5rem;
        }

        .credit a { color: var(--gray); text-decoration: none; }
        .credit a:hover { color: var(--white); }

        @media (max-width: 600px) {
            .key-figures { margin-left: 1rem; margin-right: 1rem; }
        }
    </style>
</head>
<body>
    <div class="content">
        <a href="/snapshots" class="back-link">&larr; All Snapshots</a>

        <div class="snapshot-label">Historical Snapshot</div>
        <div class="snapshot-date-heading">{{ $label }}</div>
        <div class="frozen-notice">This is a frozen historical estimate. Values will not change.</div>

        <div class="frozen-counter">
            <span class="dollar">$</span>{{ number_format($cost) }}
        </div>
        <div class="frozen-short">{{ $cost_short }}</div>

        <div class="key-figures">
            <div class="key-figures-heading">Key Figures</div>
            <div class="key-figures-row">
                <span class="key-figures-label">War start</span>
                <span class="key-figures-value">Feb 28, 2026 – 1:15 AM ET</span>
            </div>
            <div class="key-figures-row">
                <span class="key-figures-label">Initial strike cost</span>
                <span class="key-figures-value">$11.3B</span>
            </div>
            <div class="key-figures-row">
                <span class="key-figures-label">Estimated ongoing cost</span>
                <span class="key-figures-value">~$1B/day</span>
            </div>
            <div class="key-figures-row">
                <span class="key-figures-label">Snapshot date</span>
                <span class="key-figures-value">{{ $label }}</span>
            </div>
        </div>

        <div class="nav-links">
            <a href="/">View Live Counter</a>
            <a href="/methodology">View Methodology</a>
        </div>

        <div class="model-note">This estimate uses the same model as the live tracker.</div>
    </div>

    <div class="disclaimer">
        This counter is an estimate based on publicly available data &middot; Not affiliated with any government agency
        <div class="credit">Site designed and developed by <a href="https://instantimpact.io" target="_blank">InstantImpact</a></div>
    </div>
</body>
</html>
