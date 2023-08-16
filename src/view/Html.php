<?php 
namespace Will\Project\View;

abstract class Html {

    public static function getPathCss() :string{
        return __DIR__ . "/../../css/";
    }

    public static function getPathJs() :string {
        return __DIR__ . "/../../js/";
    }

    public static function init() :void {
        include __DIR__ . '/InitHtml.php';
    }

    public static function end() :void {
        include __DIR__ . '/EndHtml.php';
    }

}