<?php
namespace Will\Project\Model;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class FactoryEntityManager {

    private $bDevMode = true;

    private $aDatabase = [
        'driver' => 'pdo_pgsql',
        'host' => 'localhost',
        'port' => '5432',
        'user' => 'postgres',
        'password' => 'postgres',
        'dbname' => 'postgres'
    ];
    
    public function getEntityManager() :EntityManagerInterface {        
        $oConfig = ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/..'], $this->bDevMode);
        $oConnection = DriverManager::getConnection($this->aDatabase, $oConfig);
        return new EntityManager($oConnection, $oConfig);
    }

}