<?php 
namespace Will\Project\Model;

use \Doctrine\ORM\Mapping\Id;
use \Doctrine\ORM\Mapping\Entity;
use \Doctrine\ORM\Mapping\Table;
use \Doctrine\ORM\Mapping\Column;
use \Doctrine\ORM\Mapping\OneToMany;
use \Doctrine\Common\Collections\ArrayCollection;

use \Will\Project\Model\PessoaContato;

/** 
 * @Entity
 * @Table(name="pessoa")
 */
class Pessoa {

    /**
     * @Column(type="string", length=200)
     */
    private string $nome;

    /**
     * @Id
     * @Column(type="string", length=11)
     */
    private string $cpf;

    /**
     * @OneToMany(targetEntity="PessoaContato", mappedBy="cpf")
     */
    private ArrayCollection $contatos;

    public function __construct() {
        $this->contatos = new ArrayCollection();
    }

    public function getNome() : string {
        return $this->nome;
    }

    public function setNome($nome) : self {
        $this->nome = $nome;
        return $this;
    }

    public function getCpf() : string {
        return $this->cpf;
    }

    public function setCpf($cpf) : self {
        $this->cpf = $cpf;
        return $this;
    }

    public function getContatos() : ArrayCollection {
        return $this->contatos;
    }

    public function newContato() : PessoaContato {
        $oContato = new PessoaContato();
        $oContato->setPessoa($this);
        return $oContato;
    }

}