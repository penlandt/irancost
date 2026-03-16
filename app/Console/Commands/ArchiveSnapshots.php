<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

/**
 * Ping the Internet Archive "Save Page Now" API to request archival
 * of the main public pages on irancost.com.
 *
 * This preserves verifiable, third-party historical copies of the site
 * that are independent of the live model and cannot be retroactively
 * altered. Useful for journalistic citation and public accountability.
 *
 * The command is safe to run at any frequency. The Internet Archive
 * deduplicates snapshots automatically if the page has not changed.
 *
 * Usage:
 *   php artisan archive:snapshots
 */
class ArchiveSnapshots extends Command
{
    protected $signature = 'archive:snapshots';

    protected $description = 'Ping the Internet Archive Save Page Now API to archive the homepage and methodology page';

    /**
     * The public pages to archive.
     */
    private const URLS = [
        'https://irancost.com/',
        'https://irancost.com/methodology',
    ];

    public function handle(): int
    {
        foreach (self::URLS as $url) {
            $this->archiveUrl($url);
        }

        return self::SUCCESS;
    }

    /**
     * Send a single Save Page Now request to the Internet Archive.
     *
     * The endpoint is: https://web.archive.org/save/{url}
     * A successful request returns HTTP 200 and queues the page for capture.
     *
     * Failures are logged but never thrown — this command must not
     * affect the live site or break a cron job if the Archive is down.
     */
    private function archiveUrl(string $url): void
    {
        $endpoint = 'https://web.archive.org/save/' . $url;

        try {
            $response = Http::timeout(30)->get($endpoint);

            if ($response->successful()) {
                $this->info("Archived successfully: {$url}");
            } else {
                $this->warn("Archive request returned HTTP {$response->status()} for: {$url}");
            }
        } catch (\Exception $e) {
            // Log the failure but do not re-throw. The live site must never
            // be affected by a problem with the Internet Archive.
            $this->error("Archive request failed for {$url}: {$e->getMessage()}");
        }
    }
}
