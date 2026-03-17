<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Snapshots — Iran War Cost Tracker</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        .content { text-align: left; max-width: 620px; }
        .page-subtitle { margin-bottom: 2rem; }

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
