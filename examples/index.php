<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Arcanedev\Robots\Robots;

$robots = new Robots;

$robots->addSitemap('sitemap.xml');
$robots->addUserAgent('Google');
$robots->addHost('www.google.com');
$robots->addDisallow(['/dir-1/', '/dir-2/', '/dir-3/']);

var_dump($robots, $robots->generate());