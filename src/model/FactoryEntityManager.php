<?php
namespace Will\Project\Model;

use \Will\Project\Controller\Config;

use \Doctrine\ORM\EntityManagerInterface;
use \Doctrine\DBAL\DriverManager;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\ORMSetup;

abstract class FactoryEntityManager {
    
    public static function getEntityManager() :EntityManagerInterface {        
        $oConfig = ORMSetup::createAnnotationMetadataConfiguration([__DIR__ . '/..'], Config::getInstance()->isDevMode());
        $oConnection = DriverManager::getConnection(Config::getInstance()->getDatabase(), $oConfig);
        return new EntityManager($oConnection, $oConfig);
    }

}