<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8N0B7MF8NN"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-8N0B7MF8NN');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cost of the Iran War — Live Counter</title>
    <meta property="og:title" content="How Much Is the Iran War Costing You?" />
    <meta property="og:description" content="A live counter tracking the estimated U.S. taxpayer cost of Operation Epic Fury, based on the Pentagon's preliminary estimate of $1 billion per day." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://irancost.com" />
    <meta property="og:image" content="https://irancost.com/images/iran-war-costs.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="How Much Is the Iran War Costing You?" />
    <meta name="twitter:description" content="A live counter tracking the estimated U.S. taxpayer cost of Operation Epic Fury, based on the Pentagon's preliminary estimate of $1 billion per day." />
    <meta name="twitter:image" content="https://irancost.com/images/iran-war-costs.png" />
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Dataset",
      "name": "Iran War Cost Tracker",
      "description": "Real-time estimate of the direct operational cost to the United States government of the war with Iran, based on publicly reported defense spending figures.",
      "url": "https://irancost.com",
      "creator": {
        "@type": "Organization",
        "name": "InstantImpact",
        "url": "https://instantimpact.io"
      },
      "dateModified": "2026-03-16",
      "keywords": [
        "Iran war cost",
        "US military spending",
        "Operation Epic Fury",
        "war cost tracker",
        "defense spending"
      ],
      "distribution": [
        {
          "@type": "DataDownload",
          "encodingFormat": "text/csv",
          "contentUrl": "https://irancost.com/methodology"
        }
      ],
      "license": "https://creativecommons.org/licenses/by/4.0/"
    }
    </script>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        body { justify-content: center; }
        .content { text-align: center; padding: 2rem 1rem 50vh; max-width: 900px; }

        /* News ticker */
        .ticker-wrap {
            width: 100%;
            overflow: hidden;
            border-top: 1px solid var(--ticker-border);
            border-bottom: 1px solid var(--ticker-border);
            background: var(--box-bg);
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .ticker-label {
            flex-shrink: 0;
            padding: 0.5rem 0.75rem;
            font-size: 0.6rem;
            font-weight: 500;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--red);
            border-right: 1px solid var(--ticker-border);
        }

        .ticker-track {
            overflow: hidden;
            flex: 1;
            position: relative;
        }

        .ticker-content {
            display: inline-flex;
            white-space: nowrap;
            animation: ticker-scroll 60s linear infinite;
        }

        .ticker-content:hover {
            animation-play-state: paused;
        }

        .ticker-content span {
            padding: 0.5rem 0;
            font-size: 0.6rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--gray);
        }

        .ticker-content a {
            color: var(--gray);
            text-decoration: none;
        }

        .ticker-content a:hover {
            color: var(--white);
            text-decoration: underline;
        }

        .ticker-bullet {
            color: var(--red);
            padding: 0 5rem;
        }

        @keyframes ticker-scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Live indicator */
        .live-indicator {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-size: clamp(1.1rem, 3vw, 2rem);
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gray);
            margin-bottom: 2.5rem;
            text-shadow: 0 0 20px rgba(192, 57, 43, 0.4);
        }

        .live-dot {
            color: var(--red);
            font-size: 1.5em;
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        .site-title {
            text-align: center;
            font-family: 'DM Mono', monospace;
            font-size: 1.1rem;
            letter-spacing: 0.2em;
            color: var(--label-dim);
            padding: 10px 0 6px;
            text-transform: uppercase;
        }

        .site-intro {
            max-width: 560px;
            margin: 0.5rem auto 0;
            text-align: center;
            font-size: 0.7rem;
            line-height: 1.8;
            color: var(--label-dim);
        }

        .site-intro p {
            margin-bottom: 0.5rem;
        }

        /* Per taxpayer */
        .per-taxpayer-wrap {
            margin-bottom: 2rem;
        }

        .per-taxpayer-value {
            font-size: clamp(0.9rem, 3vw, 2.25rem);
            font-weight: 500;
            color: var(--gray);
            white-space: nowrap;
        }

        .per-taxpayer-value .tick-digits {
            color: var(--label-mid);
        }

        .per-taxpayer-label {
            font-size: 0.6rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--label);
            margin-top: 0.25rem;
        }

        .per-taxpayer-source {
            font-size: 0.55rem;
            color: var(--label);
            margin-top: 0.35rem;
        }

        .per-taxpayer-source a {
            color: var(--gray);
            text-decoration: underline;
        }

        .per-taxpayer-source a:hover {
            color: var(--white);
        }

        /* Main counter */
        .counter-wrap {
            margin-bottom: 2.5rem;
        }

        .counter-label {
            font-size: 0.7rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--label);
            margin-bottom: 0.75rem;
        }

        .counter {
            font-size: clamp(1.2rem, 6vw, 4.5rem);
            font-weight: 500;
            line-height: 1.1;
            white-space: nowrap;
            color: var(--white);
        }

        .counter .dollar {
            color: var(--gray);
        }

        .cost-range {
            font-size: 0.7rem;
            letter-spacing: 0.08em;
            color: var(--label-dim);
            margin-top: 0.5rem;
        }

        .model-info {
            max-width: 480px;
            margin: 1.5rem auto 0;
            font-size: 0.6rem;
            line-height: 2;
            color: var(--label-dim);
            letter-spacing: 0.04em;
            text-align: center;
        }

        .model-info span {
            color: var(--label);
        }

        .model-update-note {
            font-size: 0.6rem;
            color: var(--label-dim);
            letter-spacing: 0.04em;
            margin-top: 0.25rem;
            text-align: center;
        }

        .key-figures {
            max-width: 380px;
            margin: 1.5rem auto 0;
            padding: 0.75rem 1rem;
            background: var(--box-tint);
            border: 1px solid var(--border);
            border-radius: 4px;
        }

        .key-figures-heading {
            font-size: 0.6rem;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--label-dim);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .key-figures-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.65rem;
            line-height: 1.9;
        }

        .key-figures-label {
            color: var(--label-dim);
        }

        .key-figures-value {
            color: var(--gray);
        }

        .snapshot-notice {
            display: none;
            text-align: center;
            font-size: 0.65rem;
            color: var(--red);
            letter-spacing: 0.06em;
            margin-top: 0.5rem;
        }

        .snapshot-notice a {
            color: var(--gray);
            text-decoration: underline;
        }

        .snapshot-notice a:hover {
            color: var(--white);
        }

        .snapshot-permalink {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .snapshot-permalink-url {
            font-family: 'DM Mono', monospace;
            font-size: 0.55rem;
            color: var(--label);
            background: var(--box-bg);
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 0.3rem 0.6rem;
            max-width: 360px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .snapshot-copy-btn {
            font-family: 'DM Mono', monospace;
            font-size: 0.55rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--gray);
            background: var(--box-bg);
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 0.3rem 0.6rem;
            cursor: pointer;
            transition: border-color 0.2s, color 0.2s;
        }

        .snapshot-copy-btn:hover {
            color: var(--white);
            border-color: var(--gray);
        }

        /* Elapsed time boxes */
        .elapsed-row {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .elapsed-box {
            background: var(--box-bg);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0.75rem 1.25rem;
            min-width: 80px;
        }

        .elapsed-value {
            font-size: 1.5rem;
            font-weight: 500;
            color: var(--white);
        }

        .elapsed-label {
            font-size: 0.6rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--label);
            margin-top: 0.25rem;
        }

        /* Casualties */
        .casualties-section {
            margin-bottom: 2.5rem;
        }

        .casualties-row {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
        }

        .casualty-box {
            background: var(--box-bg);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0.75rem 1.25rem;
            min-width: 140px;
            text-align: center;
        }

        .casualty-value {
            font-size: 1.25rem;
            font-weight: 500;
            color: var(--chart-label-dark);
        }

        .casualty-detail {
            font-size: 0.7rem;
            color: var(--chart-label-dark);
            margin-top: 0.25rem;
        }

        .casualty-label {
            font-size: 0.6rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--label);
            margin-top: 0.4rem;
        }

        .casualties-note {
            font-size: 0.6rem;
            color: var(--label);
            line-height: 1.6;
        }

        .casualties-note a {
            color: var(--gray);
            text-decoration: underline;
        }

        .casualties-note a:hover {
            color: var(--white);
        }

        /* Gas prices */
        .gas-section {
            margin-bottom: 2.5rem;
        }

        .gas-row {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
        }

        .gas-box {
            background: var(--box-bg);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0.75rem 1.25rem;
            min-width: 140px;
            text-align: center;
        }

        .gas-value {
            font-size: 1.25rem;
            font-weight: 500;
            color: var(--white);
        }

        .gas-value .gas-arrow {
            color: var(--red);
        }

        .gas-value .gas-change {
            color: var(--red);
            font-size: 0.85rem;
        }

        .gas-label {
            font-size: 0.6rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--label);
            margin-top: 0.4rem;
        }

        .gas-note {
            font-size: 0.6rem;
            color: var(--label);
            line-height: 1.6;
        }

        .gas-note a {
            color: var(--gray);
            text-decoration: underline;
        }

        .gas-note a:hover {
            color: var(--white);
        }

        .estimate-summary {
            max-width: 620px;
            margin: 0 auto 2.5rem;
            padding: 1rem 1.25rem;
            background: var(--box-tint);
            border: 1px solid var(--border);
            border-radius: 4px;
        }

        .estimate-summary-heading {
            font-size: 0.65rem;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--label-dim);
            margin-bottom: 0.5rem;
        }

        .estimate-summary p {
            font-size: 0.7rem;
            line-height: 1.8;
            color: var(--label);
            margin: 0;
        }

        /* Opportunity cost */
        .opportunity-section {
            margin-bottom: 2.5rem;
        }

        .opportunity-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
        }

        .opportunity-box {
            background: var(--box-bg);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0.75rem 1.25rem;
            width: calc(33.333% - 0.75rem);
            min-width: 200px;
            text-align: center;
        }

        .opportunity-value {
            font-size: 1.25rem;
            font-weight: 500;
            color: var(--white);
        }

        .opportunity-label {
            font-size: 0.6rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--label);
            margin-top: 0.35rem;
        }

        .opportunity-source {
            font-size: 0.5rem;
            color: var(--label-dim);
            margin-top: 0.25rem;
        }

        .opportunity-source a {
            color: var(--label-dim);
            text-decoration: underline;
        }

        .opportunity-source a:hover {
            color: var(--white);
        }

        .opportunity-note {
            font-size: 0.6rem;
            color: var(--label);
            line-height: 1.6;
        }

        /* Stat boxes */
        .stats-row {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .stat-box {
            background: var(--box-bg);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0.75rem 1rem;
            min-width: 110px;
        }

        .stat-value {
            font-size: 1rem;
            font-weight: 500;
            color: var(--red);
        }

        .stat-label {
            font-size: 0.6rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--label);
            margin-top: 0.25rem;
        }

        /* Sources */
        .sources {
            max-width: 600px;
            margin: 0 auto 4rem;
            font-size: 0.65rem;
            line-height: 1.8;
            color: var(--label);
        }

        .sources span {
            color: var(--gray);
        }

        .sources a {
            color: var(--gray);
            text-decoration: underline;
        }

        .sources a:hover {
            color: var(--white);
        }

        /* Disclaimer */
        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4rem 0.8rem;
            font-family: 'DM Mono', monospace;
            font-size: 0.6rem;
            letter-spacing: 0.06em;
            text-decoration: none;
            color: var(--gray);
            border: 1px solid var(--border);
            border-radius: 4px;
            background: var(--box-bg);
            transition: border-color 0.2s, color 0.2s;
        }

        .share-btn:hover {
            color: var(--white);
            border-color: var(--gray);
        }

        .share-btn svg {
            width: 14px;
            height: 14px;
            fill: currentColor;
        }

        @media (max-width: 600px) {
            .elapsed-row, .stats-row, .casualties-row, .gas-row {
                flex-wrap: wrap;
            }

            .opportunity-box {
                width: 100%;
                min-width: unset;
            }

            .elapsed-box, .stat-box {
                min-width: 70px;
                padding: 0.5rem 0.75rem;
            }

            .casualty-box {
                min-width: 100%;
            }

            .elapsed-value {
                font-size: 1.2rem;
            }

            .stat-value {
                font-size: 0.85rem;
            }
        }
        .chart-section {
            max-width: 800px;
            margin: 0 auto 2.5rem;
        }

        .chart-section .counter-label {
            margin-bottom: 1rem;
        }

        .chart-container {
            position: relative;
            width: 100%;
            border: 1px solid var(--border);
            background: var(--box-bg);
            border-radius: 4px;
            padding: 1rem 0.75rem 0.5rem;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
</head>
<body>
    <div class="content">

        {{-- ─── ABOVE THE FOLD ─── --}}

        <div class="live-indicator">
            <span class="live-dot">&#9679;</span>
            OPERATION EPIC FURY &middot; LIVE
        </div>
        <div class="site-title">Iran War Cost Tracker</div>
        <p class="counter-explainer">Estimated direct operational cost to U.S. taxpayers since the start of the war with Iran.</p>

        <div class="counter-wrap">
            <div class="counter-label">Estimated Cost to U.S. Taxpayers</div>
            <div class="counter" id="counter">
                <span class="dollar">$</span>0
            </div>
            <div class="snapshot-notice" id="snapshot-notice"></div>
        </div>

        <div class="per-taxpayer-wrap">
            <div class="per-taxpayer-value" id="per-taxpayer">$0.00</div>
            <div class="per-taxpayer-label">Estimated cost per U.S. taxpayer</div>
            <div class="per-taxpayer-source">
                <a href="https://www.irs.gov/newsroom/filing-season-statistics-by-year" target="_blank" rel="noopener noreferrer">Based on 144.8M returns filed &mdash; IRS 2025 filing season data</a>
            </div>
        </div>

        <div class="elapsed-row">
            <div class="elapsed-box">
                <div class="elapsed-value" id="el-days">0</div>
                <div class="elapsed-label">Days</div>
            </div>
            <div class="elapsed-box">
                <div class="elapsed-value" id="el-hours">0</div>
                <div class="elapsed-label">Hours</div>
            </div>
            <div class="elapsed-box">
                <div class="elapsed-value" id="el-mins">0</div>
                <div class="elapsed-label">Mins</div>
            </div>
            <div class="elapsed-box">
                <div class="elapsed-value" id="el-secs">0</div>
                <div class="elapsed-label">Secs</div>
            </div>
        </div>

        <div class="stats-row">
            <div class="stat-box">
                <div class="stat-value" id="st-sec">$0</div>
                <div class="stat-label">Per Second</div>
            </div>
            <div class="stat-box">
                <div class="stat-value" id="st-min">$0</div>
                <div class="stat-label">Per Minute</div>
            </div>
            <div class="stat-box">
                <div class="stat-value" id="st-hr">$0</div>
                <div class="stat-label">Per Hour</div>
            </div>
            <div class="stat-box">
                <div class="stat-value" id="st-day">$0</div>
                <div class="stat-label">Per Day</div>
            </div>
        </div>

        <div class="casualties-section">
            <div class="casualties-row">
                <div class="casualty-box">
                    <div class="casualty-value">{{ number_format($casualties['us_killed']) }}</div>
                    <div class="casualty-detail">Wounded: {{ number_format($casualties['us_wounded']) }}</div>
                    <div class="casualty-label">US &amp; Allied Forces KIA</div>
                </div>
                <div class="casualty-box">
                    <div class="casualty-value">{{ number_format($casualties['iranian_killed']) }}+</div>
                    <div class="casualty-detail">Per Iranian Red Crescent</div>
                    <div class="casualty-label">Iranian Deaths</div>
                </div>
                <div class="casualty-box">
                    <div class="casualty-value">{{ number_format($casualties['israeli_killed']) }}+</div>
                    <div class="casualty-detail">&nbsp;</div>
                    <div class="casualty-label">Israeli Deaths</div>
                </div>
            </div>
            <div class="casualties-note">Casualty figures are manually updated. Sources: <a href="https://www.centcom.mil" target="_blank" rel="noopener noreferrer">CENTCOM</a>, <a href="https://www.en.ircs.ir" target="_blank" rel="noopener noreferrer">Iranian Red Crescent</a>, <a href="https://www.idf.il/en/" target="_blank" rel="noopener noreferrer">IDF</a>. Last updated: {{ $casualties_updated }}</div>
        </div>

        <div class="opportunity-section">
            <div class="counter-label" style="margin-bottom:1rem;">What Else Could This Buy?</div>
            <div class="opportunity-grid">
                <div class="opportunity-box">
                    <div class="opportunity-value" id="opp-homeless">0</div>
                    <div class="opportunity-label">Homeless People Housed for a Year</div>
                    <div class="opportunity-source">$12,800/person &middot; <a href="https://endhomelessness.org/resources/research-and-analysis/ending-chronic-homelessness-saves-taxpayers-money-2/" target="_blank" rel="noopener noreferrer">National Alliance to End Homelessness</a></div>
                </div>
                <div class="opportunity-box">
                    <div class="opportunity-value" id="opp-degrees">0</div>
                    <div class="opportunity-label">Full 4-Year College Degrees</div>
                    <div class="opportunity-source">$123,960/degree &middot; <a href="https://research.collegeboard.org/trends/college-pricing/highlights" target="_blank" rel="noopener noreferrer">College Board 2025</a></div>
                </div>
                <div class="opportunity-box">
                    <div class="opportunity-value" id="opp-teachers">0</div>
                    <div class="opportunity-label">Years of Teacher Salaries</div>
                    <div class="opportunity-source">$74,200/year &middot; <a href="https://www.nea.org/resource-library/educator-pay-and-student-spending-how-does-your-state-rank" target="_blank" rel="noopener noreferrer">NEA 2025</a></div>
                </div>
                <div class="opportunity-box">
                    <div class="opportunity-value" id="opp-health">0</div>
                    <div class="opportunity-label">Annual Health Insurance Premiums Covered (Single Person)</div>
                    <div class="opportunity-source">$9,325/year &middot; <a href="https://www.kff.org/health-costs/annual-family-premiums-for-employer-coverage-rise-6-in-2025-nearing-27000-with-workers-paying-6850-toward-premiums-out-of-their-paychecks/" target="_blank" rel="noopener noreferrer">KFF 2025</a></div>
                </div>
                <div class="opportunity-box">
                    <div class="opportunity-value" id="opp-socsec">0</div>
                    <div class="opportunity-label">Monthly Social Security Retirement Checks</div>
                    <div class="opportunity-source">$2,071/month &middot; <a href="https://www.ssa.gov/policy/docs/quickfacts/stat_snapshot/" target="_blank" rel="noopener noreferrer">SSA Jan 2026</a></div>
                </div>
                <div class="opportunity-box">
                    <div class="opportunity-value" id="opp-childcare">0</div>
                    <div class="opportunity-label">Years of Childcare for One Child</div>
                    <div class="opportunity-source">$13,128/year &middot; <a href="https://www.childcareaware.org/price-landscape24/" target="_blank" rel="noopener noreferrer">Child Care Aware of America 2024</a></div>
                </div>
                <div class="opportunity-box">
                    <div class="opportunity-value" id="opp-lunches">0</div>
                    <div class="opportunity-label">Children Fed Free School Lunch for a Year</div>
                    <div class="opportunity-source">$749/child/year &middot; <a href="https://www.fns.usda.gov/schoolmeals/fr-072425" target="_blank" rel="noopener noreferrer">USDA</a> ($4.16/lunch &times; 180 days)</div>
                </div>
                <div class="opportunity-box">
                    <div class="opportunity-value" id="opp-nslp">0</div>
                    <div class="opportunity-label">Years to Fund the Entire National School Lunch Program</div>
                    <div class="opportunity-source">$16.3B/year &middot; <a href="https://educationdata.org/school-lunch-debt" target="_blank" rel="noopener noreferrer">Congress/USDA 2025</a></div>
                </div>
                <div class="opportunity-box">
                    <div class="opportunity-value" id="opp-bridges">0</div>
                    <div class="opportunity-label">Structurally Deficient U.S. Bridges Repaired</div>
                    <div class="opportunity-source">$5,900,000/bridge &middot; <a href="https://artbabridgereport.org" target="_blank" rel="noopener noreferrer">ARTBA / FHWA 2023</a></div>
                </div>
            </div>
            <div class="opportunity-note">Figures update in real time based on the running cost estimate.</div>
        </div>

        {{-- ─── BELOW THE FOLD ─── --}}

        <div style="text-align:center; margin:2rem 0;">
            <a href="https://whatcouldwefund.com" target="_blank" rel="noopener noreferrer">
                <img src="/images/what-could-we-fund-social-share.png" alt="What Could We Fund?" style="max-width:100%; height:auto;">
            </a>
        </div>

        @php
            $gasBefore = $casualties['gas_price_before'] ?? 2.98;
            $gasCurrent = $casualties['gas_price_current'] ?? 3.54;
            $gasIncrease = $gasCurrent - $gasBefore;
            $gasPercent = $gasBefore > 0 ? ($gasIncrease / $gasBefore) * 100 : 0;
        @endphp
        <div class="gas-section">
            <div class="counter-label" style="margin-bottom:1rem;">Impact on Gas Prices</div>
            <div class="gas-row">
                <div class="gas-box">
                    <div class="gas-value">${{ number_format($gasBefore, 2) }}/gal</div>
                    <div class="gas-label">Before the War (Feb 27, 2026)</div>
                </div>
                <div class="gas-box">
                    <div class="gas-value">${{ number_format($gasCurrent, 2) }}/gal <span class="gas-arrow">&uarr;</span></div>
                    <div class="gas-label">Today</div>
                </div>
                <div class="gas-box">
                    <div class="gas-value"><span class="gas-change">+${{ number_format($gasIncrease, 2) }}/gal (+{{ number_format($gasPercent, 1) }}%)</span></div>
                    <div class="gas-label">Increase</div>
                </div>
            </div>
            <div class="gas-note"><a href="https://gasprices.aaa.com" target="_blank" rel="noopener noreferrer">Source: AAA</a> &middot; Last updated: {{ $gas_updated }}</div>
        </div>

        <div class="chart-section">
            <div class="counter-label">Cost of the War Over Time</div>
            <div class="chart-container">
                <canvas id="cost-chart"></canvas>
            </div>
        </div>

        <div class="section-label">Latest War Updates</div>
        <div class="ticker-wrap">
            <div class="ticker-label">News</div>
            <div class="ticker-track">
                <div class="ticker-content">
                    @if(count($headlines) > 0)
                        @foreach($headlines as $i => $headline)
                            @if($i > 0)<span class="ticker-bullet">|</span>@endif
                            <a href="{{ $headline['link'] }}" target="_blank" rel="noopener noreferrer">{{ $headline['title'] }}</a>
                        @endforeach
                        <span class="ticker-bullet">|</span>
                        @foreach($headlines as $i => $headline)
                            @if($i > 0)<span class="ticker-bullet">|</span>@endif
                            <a href="{{ $headline['link'] }}" target="_blank" rel="noopener noreferrer">{{ $headline['title'] }}</a>
                        @endforeach
                        <span class="ticker-bullet">|</span>
                    @else
                        <span>LATEST NEWS UNAVAILABLE</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- ─── ABOUT THIS TRACKER ─── --}}

        <details class="about-tracker">
            <summary>About This Tracker</summary>
            <p>IranCost.com tracks the estimated cost of the U.S. war with Iran in real time. The counter uses publicly reported Pentagon spending rates, operational cost estimates, and historical comparisons with previous U.S. conflicts. This tracker estimates the direct operational cost to the United States government of the war with Iran based on publicly reported defense spending estimates.</p>
            <p>The tracker converts the total cost into everyday equivalents such as infrastructure repairs, school funding, and healthcare spending to illustrate the opportunity cost of the war. The counter uses the Pentagon's reported $11.3 billion cost for the first six days of the war combined with an estimated ongoing operational burn rate of roughly $1 billion per day.</p>
        </details>

        {{-- ─── HOW THE TRACKER WORKS ─── --}}



        <details class="info-block">
            <summary>How the Estimate Is Calculated</summary>
            <div class="estimate-summary">
                <div class="estimate-summary-heading">How this estimate is calculated</div>
                <p>The tracker combines the Pentagon's reported $11.3B cost for the first six days of the conflict with an estimated ongoing operational burn rate of about $1B per day derived from defense-analysis estimates. The total increases continuously based on the elapsed time since the start of the conflict.</p>
            </div>
            <div class="cost-range">Estimated range based on published burn-rate estimates: $18B – $25B</div>
            <div class="model-info">
                <span>Model version:</span> 1.0<br>
                <span>Daily cost assumption:</span> approximately $1 billion per day<br>
                <span>Initial strike baseline:</span> $11.3 billion during the first six days of the conflict (Pentagon briefing to Congress)<br>
                <span>Methodology last updated:</span> March 16, 2026
            </div>
            <div class="model-update-note">The counter updates continuously using the cost model described in the <a href="/methodology" style="color:var(--gray);text-decoration:underline;">methodology</a>.</div>
        </details>

        <details class="info-block">
            <summary>Key Figures</summary>
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
                    <span class="key-figures-label">Current estimate</span>
                    <span class="key-figures-value" id="key-figures-current">$0.0B</span>
                </div>
            </div>
        </details>

        <details class="info-block">
            <summary>Sources</summary>
            <div class="sources">
                Sources: <a href="https://www.csis.org/analysis/37-billion-estimated-cost-epic-furys-first-100-hours" target="_blank" rel="noopener noreferrer">CSIS</a> — $3.7B estimated cost in first 100 hours &middot;
                <a href="https://thehill.com/homenews/5780153-operation-epic-fury-cost/" target="_blank" rel="noopener noreferrer">Pentagon briefing to Congress, March 11, 2026</a> &middot;
                <a href="https://costsofwar.watson.brown.edu/" target="_blank" rel="noopener noreferrer">Brown University Costs of War</a> — $31–34B projected total &middot;
                War start: 1:15 AM ET, Feb. 28, 2026 — <a href="https://www.army.mil/article/290823/hegseth_says_epic_fury_goals_in_iran_are_laser_focused" target="_blank" rel="noopener">U.S. CENTCOM via Army.mil</a> &middot;
                <a href="https://github.com/penlandt/irancost" target="_blank" rel="noopener noreferrer">Audit the model and data on GitHub</a>
            </div>
            <p class="methodology-link-footer">
                <a href="/methodology">View full methodology &rarr;</a>
            </p>
        </details>
    </div>

    <div class="disclaimer">
        <div class="snapshot-permalink" id="snapshot-permalink" style="display:none;">
            <span class="snapshot-permalink-url" id="snapshot-url"></span>
            <button class="snapshot-copy-btn" id="snapshot-copy">Copy</button>
        </div>
        <div class="share-buttons">
            <a class="share-btn" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Firancost.com" target="_blank" rel="noopener noreferrer">
                <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                Share
            </a>
            <a class="share-btn" href="https://x.com/intent/tweet?url=https%3A%2F%2Firancost.com&text=See%20the%20real-time%20cost%20of%20the%20Iran%20war%20to%20U.S.%20taxpayers" target="_blank" rel="noopener noreferrer">
                <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                Post
            </a>
            <a class="share-btn" href="https://bsky.app/intent/compose?text=See%20the%20real-time%20cost%20of%20the%20Iran%20war%20to%20U.S.%20taxpayers%20https%3A%2F%2Firancost.com" target="_blank" rel="noopener noreferrer">
                <svg viewBox="0 0 24 24"><path d="M12 10.8c-1.087-2.114-4.046-6.053-6.798-7.995C2.566.944 1.561 1.266.902 1.565.139 1.908 0 3.08 0 3.768c0 .69.378 5.65.624 6.479.785 2.643 3.593 3.515 6.206 3.265-3.635.649-6.565 2.235-4.29 6.862 2.423 4.928 8.197 3.428 9.46.209C12 20.583 12 18.14 12 18.14s0 2.443 0 2.443c1.263 3.22 7.037 4.72 9.46-.209 2.275-4.627-.655-6.213-4.29-6.862 2.613.25 5.421-.622 6.206-3.265.246-.828.624-5.789.624-6.479 0-.688-.139-1.86-.902-2.203-.659-.3-1.664-.62-4.3 1.24C16.046 4.748 13.087 8.687 12 10.8z"/></svg>
                Share
            </a>
        </div>
        This counter is an estimate based on publicly available data &middot; Not affiliated with any government agency
        <div class="credit">Site designed and developed by <a href="https://instantimpact.io" target="_blank">InstantImpact</a></div>
    </div>

    <script>
        (function () {
            var START   = Date.UTC(2026, 1, 28, 6, 15, 0); // CENTCOM confirmed: 1:15 AM ET
            var PHASE2  = Date.UTC(2026, 2, 6, 6, 15, 0); // 6 days after start per Pentagon briefing
            var PHASE1_TOTAL    = 11300000000;
            var PHASE1_DURATION = PHASE2 - START;
            var PHASE2_RATE_SEC = 11574.074;
            var RATE_PER_SEC = PHASE2_RATE_SEC;
            var RATE_PER_MIN = RATE_PER_SEC * 60;
            var RATE_PER_HR  = RATE_PER_MIN * 60;
            var RATE_PER_DAY = RATE_PER_SEC * 86400;

            // Snapshot detection
            var snapshotTime = null;
            var params = new URLSearchParams(window.location.search);
            var snapshotParam = params.get('snapshot');
            if (snapshotParam) {
                var parsed = new Date(snapshotParam).getTime();
                if (!isNaN(parsed) && parsed >= START) {
                    snapshotTime = parsed;
                }
            }

            // Show snapshot notice if frozen
            if (snapshotTime) {
                var noticeEl = document.getElementById('snapshot-notice');
                var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                var sd = new Date(snapshotTime);
                var hh = sd.getUTCHours(); var mi = sd.getUTCMinutes();
                var ampm = hh >= 12 ? 'PM' : 'AM';
                var h12 = hh % 12 || 12;
                var readableDate = months[sd.getUTCMonth()] + ' ' + sd.getUTCDate() + ', ' + sd.getUTCFullYear() +
                    ' at ' + h12 + ':' + (mi < 10 ? '0' : '') + mi + ' ' + ampm + ' UTC';
                noticeEl.innerHTML = 'Viewing snapshot from ' + readableDate + '. <a href="/">View live counter</a>';
                noticeEl.style.display = 'block';
            }

            // Permalink section (only for live mode)
            var permalinkWrap = document.getElementById('snapshot-permalink');
            var permalinkUrl = document.getElementById('snapshot-url');
            var copyBtn = document.getElementById('snapshot-copy');

            if (!snapshotTime) {
                permalinkWrap.style.display = 'flex';
                function updatePermalink() {
                    var n = new Date();
                    var iso = n.getUTCFullYear() + '-' +
                        String(n.getUTCMonth() + 1).padStart(2, '0') + '-' +
                        String(n.getUTCDate()).padStart(2, '0') + 'T' +
                        String(n.getUTCHours()).padStart(2, '0') + ':' +
                        String(n.getUTCMinutes()).padStart(2, '0') + 'Z';
                    permalinkUrl.textContent = 'https://irancost.com/?snapshot=' + iso;
                }
                updatePermalink();
                setInterval(updatePermalink, 60000);

                copyBtn.addEventListener('click', function () {
                    navigator.clipboard.writeText(permalinkUrl.textContent).then(function () {
                        copyBtn.textContent = 'Copied';
                        setTimeout(function () { copyBtn.textContent = 'Copy'; }, 2000);
                    });
                });
            }

            var elDays  = document.getElementById('el-days');
            var elHours = document.getElementById('el-hours');
            var elMins  = document.getElementById('el-mins');
            var elSecs  = document.getElementById('el-secs');

            var stSec = document.getElementById('st-sec');
            var stMin = document.getElementById('st-min');
            var stHr  = document.getElementById('st-hr');
            var stDay = document.getElementById('st-day');

            var counterEl = document.getElementById('counter');
            var perTaxpayerEl = document.getElementById('per-taxpayer');
            var keyFiguresCurrentEl = document.getElementById('key-figures-current');
            var TAXPAYERS = 144800000;

            var oppHomeless  = document.getElementById('opp-homeless');
            var oppDegrees   = document.getElementById('opp-degrees');
            var oppTeachers  = document.getElementById('opp-teachers');
            var oppHealth    = document.getElementById('opp-health');
            var oppSocsec    = document.getElementById('opp-socsec');
            var oppChildcare = document.getElementById('opp-childcare');
            var oppLunches   = document.getElementById('opp-lunches');
            var oppNslp      = document.getElementById('opp-nslp');
            var oppBridges   = document.getElementById('opp-bridges');

            var COST_HOMELESS = 12800;
            var COST_DEGREE   = 123960;
            var COST_TEACHER  = 74200;
            var COST_HEALTH   = 9325;
            var COST_SOCSEC   = 2071;
            var COST_CHILDCARE = 13128;
            var COST_LUNCH    = 749;
            var COST_NSLP     = 16300000000;
            var COST_BRIDGES  = 5900000;

            function formatMoney(n) {
                if (n >= 1e6) return '$' + (n / 1e6).toFixed(1) + 'M';
                if (n >= 1e3) return '$' + (n / 1e3).toFixed(1) + 'K';
                return '$' + n.toFixed(0);
            }

            function pad(n) {
                return n < 10 ? '0' + n : '' + n;
            }

            function update() {
                var now = snapshotTime || Date.now();
                var elapsed = Math.max(0, now - START);
                var elapsedSec = elapsed / 1000;

                var totalCost;
                if (now < PHASE2) {
                    totalCost = Math.floor(PHASE1_TOTAL * (elapsed / PHASE1_DURATION));
                } else {
                    var secSincePhase2 = (now - PHASE2) / 1000;
                    totalCost = Math.floor(PHASE1_TOTAL + secSincePhase2 * PHASE2_RATE_SEC);
                }

                counterEl.innerHTML =
                    '<span class="dollar">$</span>' +
                    totalCost.toLocaleString('en-US');

                keyFiguresCurrentEl.textContent = '$' + (totalCost / 1e9).toFixed(1) + 'B';

                var perTaxpayer = totalCost / TAXPAYERS;
                var ptStr = perTaxpayer.toFixed(5);
                var stablePart = ptStr.slice(0, ptStr.length - 3);
                var tickPart = ptStr.slice(ptStr.length - 3);
                perTaxpayerEl.innerHTML = '$' + stablePart + '<span class="tick-digits">' + tickPart + '</span>';

                var runningCost = totalCost;
                oppHomeless.textContent = Math.floor(runningCost / COST_HOMELESS).toLocaleString('en-US');
                oppDegrees.textContent  = Math.floor(runningCost / COST_DEGREE).toLocaleString('en-US');
                oppTeachers.textContent  = Math.floor(runningCost / COST_TEACHER).toLocaleString('en-US');
                oppHealth.textContent    = Math.floor(runningCost / COST_HEALTH).toLocaleString('en-US');
                oppSocsec.textContent    = Math.floor(runningCost / COST_SOCSEC).toLocaleString('en-US');
                oppChildcare.textContent = Math.floor(runningCost / COST_CHILDCARE).toLocaleString('en-US');
                oppLunches.textContent   = Math.floor(runningCost / COST_LUNCH).toLocaleString('en-US');
                oppNslp.textContent     = (runningCost / COST_NSLP).toFixed(2);
                oppBridges.textContent  = Math.floor(runningCost / COST_BRIDGES).toLocaleString('en-US');

                var totalSec = Math.floor(elapsedSec);
                var d = Math.floor(totalSec / 86400);
                var h = Math.floor((totalSec % 86400) / 3600);
                var m = Math.floor((totalSec % 3600) / 60);
                var s = totalSec % 60;

                elDays.textContent  = d;
                elHours.textContent = pad(h);
                elMins.textContent  = pad(m);
                elSecs.textContent  = pad(s);

                stSec.textContent = formatMoney(RATE_PER_SEC);
                stMin.textContent = formatMoney(RATE_PER_MIN);
                stHr.textContent  = formatMoney(RATE_PER_HR);
                stDay.textContent = formatMoney(RATE_PER_DAY);
            }

            update();
            if (!snapshotTime) {
                setInterval(update, 100);
            }
        })();

    </script>
    <script>
        (function () {
            var WAR_START = Date.UTC(2026, 1, 28, 6, 15, 0);
            var PHASE2_START = Date.UTC(2026, 2, 6, 6, 15, 0);
            var PHASE1_TOTAL = 11300000000;
            var PHASE1_MS = PHASE2_START - WAR_START;
            var PHASE2_RATE_PER_MS = 11574.074 / 1000;

            var now = Date.now();
            var totalDays = Math.floor((now - WAR_START) / 86400000) + 1;
            var labels = [];
            var data = [];

            for (var d = 0; d <= totalDays; d++) {
                var ts = WAR_START + d * 86400000;
                var cost;
                if (ts < PHASE2_START) {
                    var elapsed = Math.max(0, ts - WAR_START);
                    cost = PHASE1_TOTAL * (elapsed / PHASE1_MS);
                } else {
                    var secSincePhase2 = (ts - PHASE2_START) / 1000;
                    cost = PHASE1_TOTAL + secSincePhase2 * 11574.074;
                }
                labels.push('Day ' + d);
                data.push(+(cost / 1e9).toFixed(2));
            }

            var cs = getComputedStyle(document.documentElement);
            var chartRed      = cs.getPropertyValue('--red').trim();
            var chartBg       = cs.getPropertyValue('--box-bg').trim();
            var chartWhite    = cs.getPropertyValue('--white').trim();
            var chartGray     = cs.getPropertyValue('--gray').trim();
            var chartBorder   = cs.getPropertyValue('--border').trim();
            var chartLabelDim = cs.getPropertyValue('--label-dim').trim();
            var chartGrid     = cs.getPropertyValue('--chart-grid').trim();

            var ctx = document.getElementById('cost-chart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Estimated Cost ($B)',
                        data: data,
                        borderColor: chartRed,
                        backgroundColor: chartRed + '1a',
                        borderWidth: 2,
                        pointRadius: 3,
                        pointBackgroundColor: chartRed,
                        pointBorderColor: chartRed,
                        fill: true,
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2.2,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: chartBg,
                            titleColor: chartWhite,
                            bodyColor: chartGray,
                            borderColor: chartBorder,
                            borderWidth: 1,
                            callbacks: {
                                label: function (context) {
                                    return '$' + context.parsed.y.toFixed(1) + 'B';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: chartLabelDim,
                                font: { family: "'DM Mono', monospace", size: 10 },
                                maxRotation: 0,
                                autoSkip: true,
                                maxTicksLimit: 10
                            },
                            grid: {
                                color: chartGrid
                            },
                            border: {
                                color: chartBorder
                            }
                        },
                        y: {
                            ticks: {
                                color: chartLabelDim,
                                font: { family: "'DM Mono', monospace", size: 10 },
                                callback: function (value) {
                                    return '$' + value + 'B';
                                }
                            },
                            grid: {
                                color: chartGrid
                            },
                            border: {
                                color: chartBorder
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        })();
    </script>
</body>
</html>
