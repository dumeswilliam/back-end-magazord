<?php
namespace Will\Project\Controller;

use \Will\Project\Controller\InterfaceControllerRequest;

abstract class ControllerRequisicao implements InterfaceControllerRequest {

    public static function renderizar(string $sView, array $aParametros = []) :string {
        extract($aParametros);
        ob_start();
        require __DIR__ . '/../view/' . $sView;
        return ob_get_clean();
    }

}