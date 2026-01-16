<?php

require_once 'configdb.php';

class Connect {

    private PDO $pdo;
    private ConfigDB $cdb;
    private string $truc = __DIR__ . '/../conf/metalcorner.conf';
    
    public function __construct() {
        $this->cdb = new ConfigDB($this->truc);
        $this->cdb->loadFromFile();
    }

    public function connect(): PDO {
    $dsn = 'mysql:host=' . $this->cdb->getHost() . ';dbname=' . $this->cdb->getDB() . ';charset=' . $this->cdb->getCharset();
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $this->pdo = new PDO($dsn, $this->cdb->getUser(), $this->cdb->getMdp(), $options);
        return $this->pdo;
    } catch (PDOException $e) {
        die('Erreur connexion BDD : ' . $e->getMessage());
        }
    }
}
