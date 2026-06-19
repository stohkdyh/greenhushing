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

require __DIR__ . '/../public/index.php';

// Tell the application to use the custom storage path
$app = app();
$app->useStoragePath($storagePath);

