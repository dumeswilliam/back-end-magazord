<?php 
namespace Will\Project\Controller;

use \Will\Project\Model\Pessoa;
use \Will\Project\Model\PessoaContato;
use \Will\Project\Model\FactoryEntityManager;
use \Will\Project\Controller\ControllerRequisicao;

class ControllerPessoaContato extends ControllerRequisicao {
 
    public function read() :void {
        if ($_GET && $sCpf = $_GET['cpf']) {
            $oEntityManager = FactoryEntityManager::getEntityManager();
            if ($oPessoa = $oEntityManager->getRepository(Pessoa::class)->findOneBy(['cpf' => $sCpf])) {
                $aLista = $oEntityManager->getRepository(PessoaContato::class)->findBy(['pessoa' => $oPessoa]);
        
                echo self::renderizar('ViewPessoaContato.php', [
                    'sTitle' => 'Consultar Contatos de ' . $oPessoa->getNome(),
                    'aContatos' => $aLista,
                    'sCpf' => $sCpf
                ]);
            }
        }
    }
    
    public function create() :void {
        $sCpf = filter_input(INPUT_POST, 'cpf');
        $sTipo = filter_input(INPUT_POST, 'tipo');
        $sDesc = filter_input(INPUT_POST, 'desc');

        if ($sCpf && $sTipo && $sDesc) {
            $oEntityManager = FactoryEntityManager::getEntityManager();
            $oPessoa = $oEntityManager->getRepository(Pessoa::class)->findOneBy(['cpf' => $sCpf]);
            if ($oPessoa) {
                $oContato = new PessoaContato();
                $oContato->setPessoa($oPessoa);
                $oContato->setTipo($sTipo);
                $oContato->setDescricao($sDesc);

                $oEntityManager->persist($oContato);
                $oEntityManager->flush();
            }   
        }
    }
    
    public function update() :void {
        $iId = filter_input(INPUT_POST, 'id');
        $sTipo = filter_input(INPUT_POST, 'tipo');
        $sDesc = filter_input(INPUT_POST, 'desc');

        if ($iId && $sTipo && $sDesc) {
            $oEntityManager = FactoryEntityManager::getEntityManager();
            if ($oContato = $oEntityManager->getRepository(PessoaContato::class)->findOneBy(['id' => $iId])) {
                $oContato->setTipo($sTipo);
                $oContato->setDescricao($sDesc);
                $oEntityManager->flush($oContato);
            }
        }
        

    }
    
    public function delete() :void {
        $iId = filter_input(INPUT_POST, 'id');

        if ($iId) {
            $oEntityManager = FactoryEntityManager::getEntityManager();
            if ($oContato = $oEntityManager->getRepository(PessoaContato::class)->findOneBy(['id' => $iId])) {
                $oEntityManager->remove($oContato);
                $oEntityManager->flush($oContato);
            }
        }


    }

}