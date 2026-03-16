# Cost Model

## Purpose
This model estimates direct operational U.S. war spending in real time, updating continuously based on elapsed time since the start of the conflict.

## Model Inputs
- War start timestamp: February 28, 2026 at 06:15:00 UTC (1:15 AM ET)
- Initial strike cost: $11.3 billion over the first six days
- Ongoing daily burn-rate estimate: approximately $1 billion per day ($11,574.074 per second)
- Current timestamp: provided by the user's browser at time of page load

## Basic Formula
The model uses two phases:

Phase 1 (days 1–6):
estimated_total = initial_baseline × (elapsed_time / phase_1_duration)

Phase 2 (day 7 onward):
estimated_total = initial_baseline + (elapsed_seconds_after_phase_1 × per_second_rate)

This is a linear interpolation through Phase 1 and a constant burn rate through Phase 2.

## Interpretation
The model is a transparent approximation built from public reporting. It is intended to show scale and communicate the ongoing magnitude of spending, not to claim false precision. Estimates should be treated as illustrative rather than audited figures.

## Included Costs
The tracker focuses on direct operational spending: air operations, naval deployments, munitions expenditure, and logistics and support costs.

## Excluded Costs
The tracker does not include:
- Long-term veteran care and disability payments
- Reconstruction costs
- Macroeconomic effects on the broader economy
- Interest on government borrowing related to the conflict

These factors can significantly increase the true long-term cost of military conflicts.

## Update Behavior
The counter updates continuously in the user's browser based on elapsed time and fixed model assumptions. The model assumptions will be revised if substantially different figures are reported by authoritative sources.

## Snapshot Behavior
Frozen snapshot URLs (e.g. https://irancost.com/?snapshot=2026-03-16T21:00Z) allow specific estimates to be cited and verified later. Exported CSV data provides a day-by-day historical series for independent reproducibility.
