<?php

require_once "vendor/autoload.php";

use Will\Project\Model\FactoryEntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

$oEntityManager = (new FactoryEntityManager())->getEntityManager();

ConsoleRunner::run(
    new SingleManagerProvider($oEntityManager)
);