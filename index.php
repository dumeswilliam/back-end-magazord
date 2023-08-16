<?php

use \Will\Project\Controller\ControllerRequisicao;
use \Will\Project\Controller\ControllerPessoa;
use \Will\Project\Controller\ControllerPessoaContato;

require_once "vendor/autoload.php";

function getActions($sProcesso) :array {
    return [
        $sProcesso,
        $sProcesso . '/read',
        $sProcesso . '/create',
        $sProcesso . '/update',
        $sProcesso . '/delete',
    ];
}


$sProcess = $_SERVER['REQUEST_URI'];
$aProcess = explode('?', $sProcess);
$sProcess = reset($aProcess);

switch (true) {
    case in_array($sProcess, getActions('/pessoa')):
        $sProcess = str_replace('/pessoa', '', $sProcess);
        $sProcess = $sProcess ?: '/read';
        $sProcess = str_replace('/', '', $sProcess);

        $oController = new ControllerPessoa();
        $oController->$sProcess();
        break;

    case in_array($sProcess, getActions('/pessoacontato')):
        $sProcess = str_replace('/pessoacontato', '', $sProcess);
        $sProcess = $sProcess ?: '/read';
        $sProcess = str_replace('/', '', $sProcess);

        $oController = new ControllerPessoaContato();
        $oController->$sProcess();
        break;
    
    default:
        echo ControllerRequisicao::renderizar('ViewNotFound.php');
        break;
}