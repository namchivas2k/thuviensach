<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

define("BASE_DIR", str_replace("\\", "/", __DIR__));
define('APP_DIR', BASE_DIR . '/src');
define('VIEW_DIR', BASE_DIR . '/src/view');
define('BOOK_DATA_PATH', BASE_DIR . '/book.data.json');
define('BORROW_DATA_PATH', BASE_DIR . '/borrow.data.json');


include(__DIR__ . '/core/autoload.php');

//Auto load source
foreach (scandir(__DIR__ . '/src') as $sourceDir) {
    $fullPath = __DIR__ . '/src/' . $sourceDir;
    if (is_dir($fullPath) && $sourceDir !== "." && $sourceDir !== ".." && $sourceDir !== 'view' && $sourceDir !== 'router') {
        foreach (scandir($fullPath) as $childPath) {
            $fullChildPath = $fullPath . "/" . $childPath;
            if (preg_match('/(.*).php$/', $childPath)) {
                include_once($fullChildPath);
            }
        }
    }
}


require(APP_DIR . "/router/router.php");
