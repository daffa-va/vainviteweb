<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('backup:db', function () {
    $dbPath = database_path('database.sqlite');
    if (!File::exists($dbPath)) {
        $this->error('Database file not found!');
        return 1;
    }

    $backupDir = storage_path('backups');
    if (!File::exists($backupDir)) {
        File::makeDirectory($backupDir, 0755, true);
    }

    $timestamp = now()->format('Y-m-d_H-i-s');
    $backupPath = "{$backupDir}/database-{$timestamp}.sqlite";
    $latestPath = "{$backupDir}/database-latest.sqlite";

    File::copy($dbPath, $backupPath);
    File::copy($dbPath, $latestPath);

    $files = File::files($backupDir);
    $sqliteFiles = array_filter($files, function ($f) {
        return str_ends_with($f->getFilename(), '.sqlite') && !str_contains($f->getFilename(), 'latest');
    });
    usort($sqliteFiles, function ($a, $b) {
        return $a->getMTime() <=> $b->getMTime();
    });

    $maxBackups = 10;
    while (count($sqliteFiles) > $maxBackups) {
        $oldest = array_shift($sqliteFiles);
        File::delete($oldest->getPathname());
    }

    Log::info('Database backup created', ['path' => $backupPath]);
    $this->info("Backup created: {$backupPath}");
})->purpose('Backup SQLite database to storage/backups');
