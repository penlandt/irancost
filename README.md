# IranCost

IranCost.com is a real-time public tracker estimating the direct operational cost to the United States government of the war with Iran using publicly reported figures and a transparent, documented model.

## Live Site
https://irancost.com

## What This Project Does
The site provides:
- A live war cost estimate that updates continuously
- Documented methodology explaining how the estimate is calculated
- Model inputs published for public audit
- Source links to primary government and research sources
- Downloadable CSV data with historical daily snapshots
- Frozen citation permalinks so journalists can reference a stable number

## Core Model
- War start: February 28, 2026 at 1:15 AM ET
- Initial strike baseline: $11.3B over the first six days (Pentagon briefing to Congress)
- Ongoing daily burn-rate estimate: approximately $1B/day (CSIS + analyst estimates)
- The estimated total increases continuously based on elapsed time since war start

## Repository Contents
- `docs/cost_model.md` — Plain-language explanation of the calculation model
- `docs/data_sources.md` — Documentation of all sources used by the tracker
- `data/model_inputs.json` — Machine-readable model parameters
- `data/historical_costs.csv` — Day-by-day historical cost series for reproducibility

## Auditability
This repository is intended to let outside readers — journalists, researchers, and the general public — inspect the assumptions, sources, and model inputs used by the tracker. All numbers displayed on the site derive from the parameters documented here.

## Disclaimer
This project provides a modeled estimate based on publicly reported defense spending figures and a simplified operational cost model. It is not an official government accounting, and actual wartime expenditures may differ as additional information becomes available.

## Maintenance / Scheduled Tasks

### archive:snapshots
Pings the Internet Archive Save Page Now API to request archival of the homepage and methodology page.

Run manually:
```
php artisan archive:snapshots
```

To automate, add to your server's crontab:
```
0 */12 * * * cd /path/to/irancost && php artisan archive:snapshots >> /dev/null 2>&1
```

This preserves verifiable historical copies of the site independent of the live model.

## License
License information to be added.
