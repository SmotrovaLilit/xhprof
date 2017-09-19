<?php
include_once __DIR__ . '/vendor/autoload.php';
$hostForDisplayReports = 'http://xhprof-display.dev.lilit-web.ru/xhprof_html';
$type = 'xhprof-example';

use SmotrovaLilit\ProfileServiceXhprof;

$profile = new ProfileServiceXhprof($type);
$profile->startProfiling();
echo "test";
$reportId = $profile->endProfiling();
?>
<p>
    <a target="_blank" href="<?= $hostForDisplayReports . '/index.php?run=' . $reportId . '&source=' . $type ?>">Посмотреть
        отчет</a>
</p>