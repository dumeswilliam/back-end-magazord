<?php 
namespace Will\Project\Model;

use \Doctrine\ORM\Mapping\Id;
use \Doctrine\ORM\Mapping\Entity;
use \Doctrine\ORM\Mapping\Table;
use \Doctrine\ORM\Mapping\Column;
use \Doctrine\ORM\Mapping\ManyToOne;
use \Doctrine\ORM\Mapping\JoinColumn;
use \Doctrine\ORM\Mapping\GeneratedValue;

use \Will\Project\Model\Pessoa;

/** 
 * @Entity
 * @Table(name="pessoaContato")
 */
class PessoaContato {

    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string", length=20)
     */
    private string $tipo;
    
    /**
     * @Column(type="string", length=100)
     */
    private string $descricao;

    /**
     * @ManyToOne(targetEntity="Pessoa", inversedBy="pessoaContato")
     * @JoinColumn(name="cpf", referencedColumnName="cpf")
     */
    private Pessoa|null $pessoa;

    public function getId() : int {
        return $this->id;
    }

    public function setId($id) : self {
        $this->id = $id;
        return $this;
    }

    public function getTipo() : string {
        return $this->tipo;
    }

    public function setTipo($tipo) : self {
        $this->tipo = $tipo;
        return $this;
    }

    public function getDescricao() : string {
        return $this->descricao;
    }

    public function setDescricao($descricao) : self {
        $this->descricao = $descricao;
        return $this;
    }

    public function getPessoa() : Pessoa {
        return $this->pessoa;
    }

    public function setPessoa(Pessoa $pessoa) : self {
        $this->pessoa = $pessoa;
        return $this;
    }

}