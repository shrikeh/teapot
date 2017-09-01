<?php

require_once __DIR__.'/../vendor/autoload.php';

use Teapot\StatusCode;

$msgNotFound = "A not found page should return %d.\n";
echo sprintf($msgNotFound, StatusCode::NOT_FOUND);

$msgUpgradeRequired = "A client that should upgrade should be sent %d.\n";
echo sprintf($msgNotFound, StatusCode::UPGRADE_REQUIRED);
