<?php
//Autoload function
$coreListFiles = scandir(__DIR__);
foreach ($coreListFiles as $fileName) {
    $fileDir = __DIR__ . '/' . $fileName;
    if (file_exists($fileDir) && is_file($fileDir) && preg_match('/(.*).php$/', $fileDir)) {
        include_once($fileDir);
    }
}