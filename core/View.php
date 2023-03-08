<?php

class View
{
    static function setView($view = '')
    {
        $GLOBALS['renderView'] = VIEW_DIR . "/layouts/$view.view.php";
    }
    static function getData($key = null)
    {
        if ($key == null) {
            return (object) $GLOBALS['renderData'];
        }
        return isset($GLOBALS['renderData'][$key]) ? $GLOBALS['renderData'][$key] : null;
    }

    static function setData(array $data)
    {
        $GLOBALS['renderData'] = $data;
    }


    static function __partial($partialName = '')
    {
        $filePath = VIEW_DIR . "/partials/" . $partialName . ".view.php";
        if (file_exists($filePath))
            require_once($filePath);
    }

    static function __body()
    {
        if (file_exists($GLOBALS['renderView'])) {
            require_once($GLOBALS['renderView']);
        }
    }
}
