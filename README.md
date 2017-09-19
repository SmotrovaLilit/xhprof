# xhprof

[Демонстрация](http://xhprof-example.dev.lilit-web.ru/example.php)

## Установка ##

```
composer require smotrovalilit/xhprof

```
### Установка расширения xhprof для php5.6 ###
- установить необходимые модули
```
sudo apt update
sudo apt install php-pear git php5.6-dev php5.6-mcrypt php5.6-xml
sudo phpenmod mcrypt
pecl install xhprof-beta

```
- изменить файл sudo vim /etc/php/5.6/mods-available/xhprof.ini вставив текст:
```
extension=xhprof.so
```
- подключить конфиг и перезагрузить сервер
```
sudo phpenmod xhprof
sudo systemctl reload apache2
```
- проверить
```
php --ri xhprof 
```

### Установка расширения xhprof для php7 ###
[Инструкция для php7](https://xn--d1acnqm.xn--j1amh/%D0%B7%D0%B0%D0%BF%D0%B8%D1%81%D0%B8/%D1%83%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B0-xhprof-%D0%BD%D0%B0-php-7)

## Пример использования ##
### На тестируемом сайте ###
```
<?php
$hostForDisplayReports = 'http://xhprof-display.dev.lilit-web.ru/xhprof_html';
$type = 'xhprof-example'; // нужен для группировки отчетов

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
```
Отчеты сохраняются во временную системную папку. При необходимости в настройках конфига apache для хоста можно указать иной путь
```
php_admin_value xhprof.output_dir /custom_path
```

### Отображение отчетов ###
- необходимо создать хост для отображения отчетов в document_root которого скачать репозиторий
```
git clone https://github.com/phacility/xhprof ./
```
- отчеты берутся из временной системной директории. При необходимости в настройках конфига apache для хоста можно указать иной путь
```
php_admin_value xhprof.output_dir /custom_path
```
