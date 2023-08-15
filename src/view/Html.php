<?php 
namespace Will\Project\View;

class Html {

    public static function getPathCss() :string{
        return __DIR__ . "../../css/";
    }

    public static function getPathJs() :string {
        return __DIR__ . "../../js/";
    }

    public function getSweetAlert() : void {
        $sJs = self::getPathJs() . 'sweetalert2/dist/sweetalert2.all.min.js';
        $sCss = self::getPathJs() . 'sweetalert2/dist/sweetalert2.min.css';

        echo '<script src="' . $sJs . '"></script>';
        echo '<link rel="stylesheet" href="' . $sCss . '">';
    }

}