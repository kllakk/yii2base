<?php

$assets = @file_get_contents(__DIR__ . '/../web/assets/manifest.json');
$assets = (array)json_decode($assets);

return [
    'adminEmail' => 'admin@example.com',
    'assets' => $assets
];
