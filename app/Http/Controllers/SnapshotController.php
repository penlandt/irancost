<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class SnapshotController extends Controller
{
    private const WAR_START = '2026-02-28 06:15:00';
    private const PHASE2_START = '2026-03-06 06:15:00';
    private const PHASE1_TOTAL = 11300000000;
    private const PHASE1_SECONDS = 518400; // 6 days
    private const PHASE2_RATE = 11574.074;

    private function calculateCost(Carbon $timestamp): int
    {
        $warStart = Carbon::parse(self::WAR_START, 'UTC');
        $phase2Start = Carbon::parse(self::PHASE2_START, 'UTC');

        if ($timestamp->lte($warStart)) {
            return 0;
        }

        if ($timestamp->lt($phase2Start)) {
            $elapsed = $warStart->diffInSeconds($timestamp);
            return (int) floor(self::PHASE1_TOTAL * ($elapsed / self::PHASE1_SECONDS));
        }

        $secSincePhase2 = $phase2Start->diffInSeconds($timestamp);
        return (int) floor(self::PHASE1_TOTAL + $secSincePhase2 * self::PHASE2_RATE);
    }

    public function index()
    {
        $warStart = Carbon::parse(self::WAR_START, 'UTC');
        $yesterday = Carbon::yesterday('UTC');
        $dates = [];

        for ($date = $yesterday->copy(); $date->gte($warStart->startOfDay()); $date->subDay()) {
            $midnight = $date->copy()->startOfDay();
            $cost = $this->calculateCost($midnight);
            $dates[] = [
                'date' => $date->format('Y-m-d'),
                'label' => $date->format('F j, Y'),
                'cost' => $cost,
                'cost_formatted' => '$' . number_format($cost / 1e9, 1) . 'B',
            ];
        }

        return view('snapshots.index', ['dates' => $dates]);
    }

    public function show($date)
    {
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            abort(404);
        }

        try {
            $dateObj = Carbon::parse($date, 'UTC')->startOfDay();
        } catch (\Exception $e) {
            abort(404);
        }

        $warStart = Carbon::parse(self::WAR_START, 'UTC');
        $yesterday = Carbon::yesterday('UTC');

        if ($dateObj->lt($warStart->copy()->startOfDay()) || $dateObj->gt($yesterday)) {
            abort(404);
        }

        $cost = $this->calculateCost($dateObj);

        return view('snapshots.show', [
            'date' => $date,
            'label' => $dateObj->format('F j, Y'),
            'cost' => $cost,
            'cost_formatted' => '$' . number_format($cost),
            'cost_short' => '$' . number_format($cost / 1e9, 1) . 'B',
        ]);
    }
}
