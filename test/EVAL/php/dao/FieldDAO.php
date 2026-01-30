<?php

require_once __DIR__ . '/../entities/Fields.php';
require_once __DIR__ . '/../lib/Database/php';

class FieldDAO {

    // Connexion à l'aide du database.php
    private PDO $pdo;

    public function __construct(){
        $this->pdo = Connect::connect();
    }

    

}