<?php

// Ensure /tmp directories are created for Vercel
$storagePath = '/tmp/storage';
if (!is_dir($storagePath)) {
    mkdir($storagePath, 0777, true);
    mkdir("$storagePath/framework/cache/data", 0777, true);
    mkdir("$storagePath/framework/views", 0777, true);
    mkdir("$storagePath/framework/sessions", 0777, true);
    mkdir("$storagePath/logs", 0777, true);
    mkdir("$storagePath/bootstrap/cache", 0777, true);
}

// Override Laravel's compiled view path and other cache paths
$_ENV['VIEW_COMPILED_PATH'] = "$storagePath/framework/views";
$_SERVER['VIEW_COMPILED_PATH'] = "$storagePath/framework/views";
$_ENV['APP_SERVICES_CACHE'] = "$storagePath/bootstrap/cache/services.php";
$_SERVER['APP_SERVICES_CACHE'] = "$storagePath/bootstrap/cache/services.php";
$_ENV['APP_PACKAGES_CACHE'] = "$storagePath/bootstrap/cache/packages.php";
$_SERVER['APP_PACKAGES_CACHE'] = "$storagePath/bootstrap/cache/packages.php";
$_ENV['APP_CONFIG_CACHE'] = "$storagePath/bootstrap/cache/config.php";
$_SERVER['APP_CONFIG_CACHE'] = "$storagePath/bootstrap/cache/config.php";
$_ENV['APP_ROUTES_CACHE'] = "$storagePath/bootstrap/cache/routes.php";
$_SERVER['APP_ROUTES_CACHE'] = "$storagePath/bootstrap/cache/routes.php";
$_ENV['APP_EVENTS_CACHE'] = "$storagePath/bootstrap/cache/events.php";
$_SERVER['APP_EVENTS_CACHE'] = "$storagePath/bootstrap/cache/events.php";

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
