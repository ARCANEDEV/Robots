<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Arcanedev\Robots\Robots;

$robots = new Robots;

$robots->addUserAgent('Google');
$robots->addDisallow(['/admin/', '/login/', '/secret/']);
$robots->addSpacer();
$robots->addSitemap('sitemap.xml');

header('HTTP/1.1 200 OK');
echo $robots->generate();
