<?php
namespace Will\Project\Controller;

class Config {

    private static Config $oInstance;

    private array $aDatabase = [
        'driver' => 'pdo_pgsql',
        'host' => 'localhost',
        'port' => '5432',
        'user' => 'postgres',
        'password' => '260203',
        'dbname' => 'postgres'
    ];

    private bool $bDevMode = true;

    private function __construct() { }

    public static function getInstance() :Config {
        if (!isset(self::$oInstance)) {
            self::$oInstance = new self;
        }
        return self::$oInstance;
    }

    public function getDatabase() :array {
        return $this->aDatabase;
    }

    public function isDevMode() :bool {
        return $this->bDevMode;
    }

}
