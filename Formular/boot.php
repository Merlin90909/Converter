<?php
session_start();
//declare(strict_types=1);

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

require_once __DIR__ . "/vendor/autoload.php";

$whoops = new Run();
$whoops->pushHandler(new PrettyPageHandler());
$whoops->register();