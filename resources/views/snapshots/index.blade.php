<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Snapshots — Iran War Cost Tracker</title>
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
            text-align: left;
            padding: 2rem 1rem 6rem;
            max-width: 620px; width: 100%;
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

        .page-title {
            text-align: center;
            font-size: 1.1rem; letter-spacing: 0.2em;
            color: var(--gray); text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            text-align: center;
            font-size: 0.65rem; letter-spacing: 0.1em;
            color: var(--label-dim); text-transform: uppercase;
            margin-bottom: 2rem;
        }

        .snapshot-list {
            list-style: none;
        }

        .snapshot-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.65rem 0.75rem;
            border: 1px solid var(--border);
            background: var(--box-bg);
            border-radius: 4px;
            margin-bottom: 0.5rem;
            transition: border-color 0.2s;
        }

        .snapshot-item:hover {
            border-color: var(--gray);
        }

        .snapshot-item a {
            text-decoration: none;
            color: inherit;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .snapshot-date {
            font-size: 0.7rem;
            color: var(--gray);
        }

        .snapshot-cost {
            font-size: 0.7rem;
            color: var(--label);
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
    </style>
</head>
<body>
    <div class="content">
        <a href="/" class="back-link">&larr; Back to Live Counter</a>

        <div class="page-title">Daily Snapshots</div>
        <div class="page-subtitle">Iran War Cost Tracker</div>

        <ul class="snapshot-list">
            @foreach($dates as $entry)
                <li class="snapshot-item">
                    <a href="/snapshots/{{ $entry['date'] }}">
                        <span class="snapshot-date">{{ $entry['label'] }}</span>
                        <span class="snapshot-cost">{{ $entry['cost_formatted'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>

        <div style="text-align:center;margin-top:1.5rem;">
            <a href="/methodology" style="font-size:0.65rem;letter-spacing:0.1em;text-transform:uppercase;color:var(--label-dim);text-decoration:none;transition:color 0.2s;">Methodology</a>
        </div>
    </div>

    <div class="disclaimer">
        This counter is an estimate based on publicly available data &middot; Not affiliated with any government agency
        <div class="credit">Site designed and developed by <a href="https://instantimpact.io" target="_blank">InstantImpact</a></div>
    </div>
</body>
</html>
