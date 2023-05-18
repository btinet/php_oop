<?php


use App\Bootstrap;

ob_start();

// Autoload laden
require_once __DIR__.'/vendor/autoload.php';

// App starten
$app = new Bootstrap();

ob_flush();