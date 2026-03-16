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
    <title>Methodology — Iran War Cost Tracker</title>
    <meta property="og:title" content="Methodology — Iran War Cost Tracker" />
    <meta property="og:description" content="How we estimate the cost of Operation Epic Fury: data sources, models, and limitations." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://irancost.com/methodology" />
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

        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        /* Grain texture overlay */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.04;
            pointer-events: none;
            z-index: 1;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 256px 256px;
        }

        /* Radial vignette */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at center, transparent 40%, rgba(0,0,0,0.6) 100%);
            pointer-events: none;
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: left;
            padding: 2rem 1rem 6rem;
            max-width: 760px;
            width: 100%;
        }

        .back-link {
            display: inline-block;
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--label-dim);
            text-decoration: none;
            margin-bottom: 2rem;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: var(--white);
        }

        .page-title {
            text-align: center;
            font-size: 1.1rem;
            letter-spacing: 0.2em;
            color: var(--gray);
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            text-align: center;
            font-size: 0.65rem;
            letter-spacing: 0.1em;
            color: var(--label-dim);
            text-transform: uppercase;
            margin-bottom: 3rem;
        }

        .section {
            border: 1px solid var(--border);
            background: var(--box-bg);
            border-radius: 4px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .section-heading {
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--red);
            margin-bottom: 1rem;
        }

        .section p {
            font-size: 0.75rem;
            line-height: 1.8;
            color: var(--label);
            margin-bottom: 1rem;
        }

        .section ul {
            list-style: none;
            padding: 0;
        }

        .section ul li {
            font-size: 0.7rem;
            line-height: 1.8;
            color: var(--label);
            padding-left: 1.2rem;
            position: relative;
        }

        .section ul li::before {
            content: '\2022';
            color: var(--red);
            position: absolute;
            left: 0;
        }

        .section a {
            color: var(--gray);
            text-decoration: underline;
        }

        .section a:hover {
            color: var(--white);
        }

        .csv-download {
            text-align: center;
            margin: 1.5rem 0 2rem;
        }

        .csv-download button {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            font-family: 'DM Mono', monospace;
            font-size: 0.65rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--gray);
            border: 1px solid var(--border);
            border-radius: 4px;
            background: var(--box-bg);
            cursor: pointer;
            transition: border-color 0.2s, color 0.2s;
        }

        .csv-download button:hover {
            color: var(--white);
            border-color: var(--gray);
        }

        .flow-diagram {
            display: flex;
            justify-content: center;
            margin: 0 0 2rem;
        }

        .citation-block {
            font-family: 'DM Mono', monospace;
            font-size: 0.7rem;
            line-height: 1.8;
            color: var(--gray);
            background: rgba(255,255,255,0.03);
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 0.75rem 1rem;
        }

        .section table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            font-size: 0.7rem;
            line-height: 1.7;
        }

        .section table th {
            text-align: left;
            font-weight: 500;
            font-size: 0.65rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--gray);
            padding: 0.5rem 0.6rem;
            border-bottom: 1px solid var(--border);
        }

        .section table td {
            color: var(--label);
            padding: 0.5rem 0.6rem;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
        }

        .section table tr:last-child td {
            border-bottom: none;
        }

        .section table tr.totals-row td {
            border-top: 2px solid var(--border);
            color: var(--gray);
            font-weight: 500;
        }

        .section .table-disclaimer {
            font-size: 0.65rem;
            line-height: 1.7;
            color: var(--label-dim);
            font-style: italic;
        }

        .disclaimer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            padding: 0.75rem 1rem 0.5rem;
            font-size: 0.55rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--label-dim);
            background: linear-gradient(to top, var(--bg) 60%, transparent);
            z-index: 3;
        }

        .credit {
            text-align: center;
            font-size: 0.55rem;
            letter-spacing: 0.08em;
            color: var(--label-dim);
            padding-bottom: 0.5rem;
        }

        .credit a {
            color: var(--gray);
            text-decoration: none;
        }

        .credit a:hover {
            color: var(--white);
        }

        @media (max-width: 600px) {
            .section {
                padding: 1rem;
            }

            .page-title {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <a href="/" class="back-link">&larr; Back to Live Counter</a>

        <div class="page-title">Methodology</div>
        <div class="page-subtitle">Iran War Cost Tracker</div>
        <div class="page-subtitle">How we estimate the cost of Operation Epic Fury</div>

        <div class="flow-diagram">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 380" width="400" style="max-width:100%;height:auto;">
                <style>
                    .node-box { fill: #111110; stroke: #2a2a28; stroke-width: 1; rx: 4; ry: 4; }
                    .node-text { fill: #e8e0d0; font-family: 'DM Mono', monospace; font-size: 11px; text-anchor: middle; }
                    .node-sub { fill: #aaaaaa; font-family: 'DM Mono', monospace; font-size: 9px; text-anchor: middle; }
                    .arrow-line { stroke: #3a3a38; stroke-width: 1.5; }
                    .arrow-head { fill: #3a3a38; }
                </style>
                <defs>
                    <marker id="ah" markerWidth="8" markerHeight="6" refX="8" refY="3" orient="auto">
                        <polygon points="0 0, 8 3, 0 6" class="arrow-head"/>
                    </marker>
                </defs>

                <!-- Node 1: War Start -->
                <rect class="node-box" x="75" y="10" width="250" height="40"/>
                <text class="node-text" x="200" y="35">War Start Timestamp</text>

                <!-- Arrow 1→2 -->
                <line class="arrow-line" x1="200" y1="50" x2="200" y2="78" marker-end="url(#ah)"/>

                <!-- Node 2: Initial Strike -->
                <rect class="node-box" x="40" y="80" width="320" height="50"/>
                <text class="node-text" x="200" y="101">Initial Strike Estimate</text>
                <text class="node-sub" x="200" y="119">$11.3B over first 6 days</text>

                <!-- Arrow 2→3 -->
                <line class="arrow-line" x1="200" y1="130" x2="200" y2="158" marker-end="url(#ah)"/>

                <!-- Node 3: Burn Rate -->
                <rect class="node-box" x="40" y="160" width="320" height="50"/>
                <text class="node-text" x="200" y="181">Daily Burn-Rate Model</text>
                <text class="node-sub" x="200" y="199">~$1B/day from day 7 onward</text>

                <!-- Arrow 3→4 -->
                <line class="arrow-line" x1="200" y1="210" x2="200" y2="238" marker-end="url(#ah)"/>

                <!-- Node 4: Elapsed Time -->
                <rect class="node-box" x="55" y="240" width="290" height="40"/>
                <text class="node-text" x="200" y="265">Elapsed Time Since War Start</text>

                <!-- Arrow 4→5 -->
                <line class="arrow-line" x1="200" y1="280" x2="200" y2="308" marker-end="url(#ah)"/>

                <!-- Node 5: Total -->
                <rect class="node-box" x="65" y="310" width="270" height="40" style="stroke:#c0392b;"/>
                <text class="node-text" x="200" y="335" style="fill:#f0f0f0;">Current Estimated Total</text>
            </svg>
        </div>

        <div class="section">
            <div class="section-heading">View the Model and Data</div>
            <p>The tracker's documentation, model inputs, and supporting data are published in the public GitHub repository for audit and review.</p>
            <p><a href="https://github.com/penlandt/irancost" target="_blank" rel="noopener noreferrer">View repository on GitHub</a></p>
            <p><a href="/snapshots">Browse historical snapshots</a></p>
        </div>

        <div class="section">
            <div class="section-heading">Published Cost Estimates</div>
            <p>Public estimates of the cost of the war with Iran vary depending on methodology and which categories of spending are included. Some estimates count only operational costs, while others include munitions expenditures, deployment costs, and equipment replacement. The IranCost tracker uses a midpoint estimate within the range of publicly reported figures.</p>
            <table>
                <thead>
                    <tr>
                        <th>Source</th>
                        <th>Reported Cost</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pentagon briefing to Congress</td>
                        <td>$11.3B in the first six days</td>
                        <td>Early war estimate reported to lawmakers; much of the cost reflects munitions used during the initial strike phase.</td>
                    </tr>
                    <tr>
                        <td>Center for Strategic and International Studies (CSIS) analysis</td>
                        <td>$3.7B in the first 100 hours</td>
                        <td>Equivalent to roughly $0.9B per day during the early phase of the conflict.</td>
                    </tr>
                    <tr>
                        <td>Independent analyst consensus</td>
                        <td>$0.8B–$1.2B per day</td>
                        <td>Estimated steady-state cost of ongoing operations after the initial surge in munitions use.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <div class="section-heading">Cost Model Used by This Tracker</div>
            <p>Based on publicly reported figures and historical comparisons with previous U.S. military operations, the tracker assumes an approximate average daily cost of about $1 billion once the conflict moved beyond the initial strike phase. This estimate falls within the range suggested by multiple independent analyses and Pentagon briefings.</p>
            <table>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Approximate Daily Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Air operations</td>
                        <td>$300M</td>
                    </tr>
                    <tr>
                        <td>Naval deployments</td>
                        <td>$200M</td>
                    </tr>
                    <tr>
                        <td>Munitions expenditure</td>
                        <td>$350M</td>
                    </tr>
                    <tr>
                        <td>Logistics, intelligence, and support</td>
                        <td>$150M</td>
                    </tr>
                    <tr class="totals-row">
                        <td>Total estimated daily cost</td>
                        <td>&asymp; $1.0B</td>
                    </tr>
                </tbody>
            </table>
            <p class="table-disclaimer">These component estimates are illustrative and based on publicly available military cost analyses and historical operational costs. Actual wartime expenditures fluctuate depending on operational tempo, weapon usage, and deployment levels.</p>
        </div>
        <p class="table-disclaimer" style="max-width:620px;margin:0 auto 1.5rem;text-align:center;">This tracker provides a modeled estimate based on publicly reported defense spending figures and a simplified operational cost model. It should be interpreted as an approximate real-time estimate rather than an official accounting.</p>

        <div class="section">
            <div class="section-heading">Costs Not Included in This Estimate</div>
            <p>This estimate focuses on direct operational spending and does not include long-term veteran care, reconstruction costs, macroeconomic impacts, or interest on government borrowing. These factors can significantly increase the total long-term cost of military conflicts but are not included in this real-time operational estimate.</p>
        </div>

        <div class="section">
            <div class="section-heading">How Data Is Collected</div>
            <p>Cost estimates are drawn from a combination of official U.S. government sources, nonpartisan defense research organizations, and real-time data feeds. No original analysis is conducted — this tracker synthesizes and presents publicly available figures as they are reported.</p>
            <ul>
                <li><a href="https://thehill.com/homenews/5780153-operation-epic-fury-cost/" target="_blank" rel="noopener noreferrer">Pentagon briefings to Congress</a> — The primary basis for cost estimates, including the March 11, 2026 briefing that informed early operational cost figures.</li>
                <li><a href="https://www.csis.org/analysis/37-billion-estimated-cost-epic-furys-first-100-hours" target="_blank" rel="noopener noreferrer">CSIS (Center for Strategic and International Studies)</a> — Published an estimate of $3.7B for the first 100 hours of Operation Epic Fury, used to calibrate the Phase 1 cost model.</li>
                <li><a href="https://costsofwar.watson.brown.edu/" target="_blank" rel="noopener noreferrer">Brown University Costs of War Project</a> — Provides a projected total range of $31–34B, used to inform the longer-term rate model.</li>
                <li>AAA Gas Prices — Daily national average gas prices sourced from AAA, compared against the pre-war baseline of $2.98/gal (February 27, 2026).</li>
                <li>BBC RSS Feed — Live headlines are pulled from the BBC News RSS feed and cached every 5 minutes to populate the news ticker.</li>
                <li>Casualty data — Manually updated by site administrators using figures from CENTCOM, the Iranian Red Crescent, and the IDF. Last updated March 13, 2026.</li>
            </ul>
        </div>

        <div class="section">
            <div class="section-heading">Model Inputs</div>
            <table>
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Value</th>
                        <th>Source</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>War start timestamp</td>
                        <td>Feb 28, 2026 – 1:15 AM ET</td>
                        <td>News reports of first strike</td>
                    </tr>
                    <tr>
                        <td>Initial strike cost</td>
                        <td>$11.3B</td>
                        <td>Pentagon briefing to Congress</td>
                    </tr>
                    <tr>
                        <td>Daily burn-rate estimate</td>
                        <td>$1.0B/day</td>
                        <td>CSIS + analyst estimates</td>
                    </tr>
                    <tr>
                        <td>Counter update interval</td>
                        <td>Continuous</td>
                        <td>Site calculation</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <div class="section-heading">How Analysis / Scoring Works</div>
            <p>The running cost total uses a two-phase model to reflect how military spending estimates have evolved since the start of the conflict. The counter runs entirely in the user's browser using JavaScript, updating every second based on the calculated rate. The counter begins at the time of the first confirmed strike marking the start of the conflict, recorded as February 28, 2026 at 1:15 AM Eastern Time.</p>
            <ul>
                <li>Phase 1 (Days 1–6, Feb 28 – Mar 5, 2026): The total cost is linearly interpolated from $0 at war start (1:15 AM ET, February 28, 2026) to $11.1B at the end of day 6, based on the CSIS estimate of $3.7B for the first 100 hours scaled proportionally.</li>
                <li>Phase 2 (Day 7 onward): A flat rate of approximately $11,574 per second ($1B/day) is applied, derived from the Brown University projected total and Pentagon briefing data.</li>
                <li>Per-taxpayer cost: The running total is divided by 144.8 million — the number of individual returns filed in the IRS 2025 filing season — to produce the estimated cost per taxpayer.</li>
                <li>Opportunity cost figures: Each alternative-use figure (e.g. homes, degrees, school lunches) is calculated by dividing the running total by the published per-unit cost from the cited source, updated every second.</li>
                <li>Gas price impact: The difference between today's AAA national average and the pre-war baseline ($2.98/gal on February 27, 2026) is displayed as both a dollar figure and a percentage increase. This figure is manually updated.</li>
            </ul>
        </div>

        <div class="section">
            <div class="section-heading">Tools & Models Used</div>
            <p>This site is built with standard web technologies and does not use artificial intelligence or predictive modeling. All estimates are derived directly from published figures.</p>
            <ul>
                <li>Laravel (PHP framework) — Powers the backend, handles routing, caches the BBC RSS feed, and serves casualty and gas price data from a JSON file updated via the admin panel.</li>
                <li>JavaScript (vanilla) — Drives the real-time counter, calculating and updating all figures client-side every second without page reloads.</li>
                <li>BBC RSS API — Provides live headlines via RSS, fetched and cached server-side every 5 minutes.</li>
                <li>Admin panel — A simple password-protected internal tool used to manually update casualty figures and gas price data as new information becomes available.</li>
                <li>Public data sources — All cost, casualty, and economic figures are sourced from the organizations cited on this page and on the main counter.</li>
            </ul>
        </div>

        <div class="section">
            <div class="section-heading">Limitations & Caveats</div>
            <p>This tracker is an estimate. Military operations are dynamic, reporting is often delayed, and the true cost of war extends far beyond initial operational expenditures. Treat all figures as illustrative, not definitive.</p>
            <ul>
                <li>Preliminary estimates subject to revision: The Pentagon and CSIS figures used in this model are early-stage estimates that will likely be revised as the conflict continues and audits are completed.</li>
                <li>Long-term costs not included: This counter reflects near-term operational costs only. It does not account for veteran healthcare, long-term disability payments, interest on war-related debt, or reconstruction costs — which historically dwarf initial operational spending.</li>
                <li>Casualty figures may lag: Casualty data is manually updated and relies on official reporting from CENTCOM, the Iranian Red Crescent, and the IDF. All parties have incentives that may affect the timeliness or completeness of their reporting.</li>
                <li>Gas price correlation is not causation: The gas price increase shown reflects the change in the national average since the start of the conflict. Multiple factors affect gas prices; this site does not claim the war is the sole cause of the increase.</li>
                <li>Not affiliated with any government agency: This site is an independent public information tool. It has no affiliation with the U.S. government, military, or any political organization.</li>
            </ul>
        </div>
        <div class="section">
            <div class="section-heading">How to Cite This Tracker</div>
            <div class="citation-block">IranCost.com. <em>Iran War Cost Tracker.</em> Accessed <span id="cite-date"></span>. https://irancost.com</div>
        </div>
        <div class="csv-download">
            <button id="csv-btn">Download today's cost estimate data (CSV)</button>
        </div>
    </div>

    <script>
        (function () {
            var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
            var d = new Date();
            document.getElementById('cite-date').textContent = months[d.getMonth()] + ' ' + d.getDate() + ', ' + d.getFullYear();
        })();

        document.getElementById('csv-btn').addEventListener('click', function () {
            var WAR_START = Date.UTC(2026, 1, 28, 6, 15, 0);
            var PHASE2_START = Date.UTC(2026, 2, 6, 6, 15, 0);
            var PHASE1_TOTAL = 11300000000;
            var PHASE1_MS = PHASE2_START - WAR_START;
            var PHASE2_RATE_SEC = 11574.074;

            function calcCost(ts) {
                if (ts <= WAR_START) return 0;
                if (ts < PHASE2_START) {
                    return Math.floor(PHASE1_TOTAL * ((ts - WAR_START) / PHASE1_MS));
                }
                return Math.floor(PHASE1_TOTAL + ((ts - PHASE2_START) / 1000) * PHASE2_RATE_SEC);
            }

            function toISO(ts) {
                var d = new Date(ts);
                return d.getUTCFullYear() + '-' +
                    String(d.getUTCMonth() + 1).padStart(2, '0') + '-' +
                    String(d.getUTCDate()).padStart(2, '0') + 'T' +
                    String(d.getUTCHours()).padStart(2, '0') + ':' +
                    String(d.getUTCMinutes()).padStart(2, '0') + ':' +
                    String(d.getUTCSeconds()).padStart(2, '0') + 'Z';
            }

            var rows = ['timestamp,total_cost_usd'];

            // First row: war start
            rows.push('2026-02-28T01:15:00-05:00,0');

            // Daily rows at midnight UTC, starting the day after war start
            var dayMs = 86400000;
            // First midnight UTC after war start: 2026-03-01T00:00:00Z
            var firstMidnight = Date.UTC(2026, 2, 1, 0, 0, 0);
            var now = Date.now();
            // Today's midnight UTC
            var todayUTC = new Date(now);
            var todayMidnight = Date.UTC(todayUTC.getUTCFullYear(), todayUTC.getUTCMonth(), todayUTC.getUTCDate(), 0, 0, 0);

            for (var ts = firstMidnight; ts <= todayMidnight; ts += dayMs) {
                rows.push(toISO(ts) + ',' + calcCost(ts));
            }

            var today = new Date();
            var dateStr = today.getFullYear() + '-' +
                String(today.getMonth() + 1).padStart(2, '0') + '-' +
                String(today.getDate()).padStart(2, '0');

            var csv = rows.join('\n');
            var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'irancost-estimate-' + dateStr + '.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });
    </script>

    <div class="disclaimer">
        This counter is an estimate based on publicly available data &middot; Not affiliated with any government agency
        <div class="credit">Site designed and developed by <a href="https://instantimpact.io" target="_blank">InstantImpact</a></div>
    </div>
</body>
</html>
