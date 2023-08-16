<?php 
namespace Will\Project\Controller;

use \Will\Project\Model\Pessoa;
use \Will\Project\Model\PessoaContato;
use \Will\Project\Model\FactoryEntityManager;
use \Will\Project\Controller\ControllerRequisicao;

class ControllerPessoa extends ControllerRequisicao {
 
    public function read() :void {
        $oEntityManager = FactoryEntityManager::getEntityManager();
        $aListaPessoas = $oEntityManager->getRepository(Pessoa::class)->findAll();

        echo self::renderizar('ViewPessoa.php', [
            'sTitle' => 'Consultar Pessoas Cadastradas',
            'aPessoas' => $aListaPessoas
        ]);
    }
    
    public function create() :void {
        $sCpf = filter_input(INPUT_POST, 'cpf');
        $sNome = filter_input(INPUT_POST, 'nome');

        if ($sCpf && $sNome) {
            $oPessoa = new Pessoa();
            $oPessoa->setCpf($sCpf);
            $oPessoa->setNome($sNome);
            
            $oEntityManager = FactoryEntityManager::getEntityManager();
            $oEntityManager->persist($oPessoa);
            $oEntityManager->flush();
        }
    }
    
    public function update() :void {
        $sCpf = filter_input(INPUT_POST, 'cpf');
        $sNome = filter_input(INPUT_POST, 'nome');

        if ($sCpf && $sNome) {
            $oEntityManager = FactoryEntityManager::getEntityManager();
            if ($oPessoa = $oEntityManager->getRepository(Pessoa::class)->findOneBy(['cpf' => $sCpf])) {
                $oPessoa->setNome($sNome);
                $oEntityManager->flush($oPessoa);
            }
        }
    }
    
    public function delete() :void {
        $sCpf = filter_input(INPUT_POST, 'cpf');
        
        if ($sCpf) {
            $oEntityManager = FactoryEntityManager::getEntityManager();
            if ($oPessoa = $oEntityManager->getRepository(Pessoa::class)->findOneBy(['cpf' => $sCpf])) {
                
                $oEntityManager->remove($oPessoa);
                $oEntityManager->flush($oPessoa);
            }
        }
    }

}