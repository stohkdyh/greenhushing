<?php

// Ensure /tmp directories are created for Vercel
$storagePath = '/tmp/storage';
if (!is_dir($storagePath)) {
    mkdir($storagePath, 0777, true);
    mkdir("$storagePath/framework/cache/data", 0777, true);
    mkdir("$storagePath/framework/views", 0777, true);
    mkdir("$storagePath/framework/sessions", 0777, true);
    mkdir("$storagePath/logs", 0777, true);
}

// Override Laravel's compiled view path
$_ENV['VIEW_COMPILED_PATH'] = "$storagePath/framework/views";
$_SERVER['VIEW_COMPILED_PATH'] = "$storagePath/framework/views";

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Tell the application to use the custom storage path for Vercel
$app->useStoragePath($storagePath);

// Handle the request...
$app->handleRequest(Illuminate\Http\Request::capture());
