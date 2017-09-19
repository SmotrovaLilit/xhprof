<?php
include_once __DIR__ . '/vendor/autoload.php';
$hostForDisplayReports = 'http://xhprof-display.dev.lilit-web.ru/xhprof_html';
use SmotrovaLilit\ProfileServiceXhprof;

$profile = new ProfileServiceXhprof('test');
$profile->startProfiling();
echo "test";
$reportId = $profile->endProfiling();