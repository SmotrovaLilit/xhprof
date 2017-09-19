<?php
include_once __DIR__ . '/vendor/autoload.php';
$hostForDisplayReports = 'http://xhprof-display.lilit-web.ru';
use SmotrovaLilit\ProfileServiceXhprof;

$profile = new ProfileServiceXhprof('test');
$profile->startProfiling();
echo "test";
$reportId = $profile->endProfiling();
header('Location: ' . $hostForDisplayReports . ' /index.php?run=' . $reportId . '&source=test');