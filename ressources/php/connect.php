<?php 

    require_once 'configdb.php';

class Connect {

    private string $truc = __DIR__ . '/../conf/metalcorner.conf';
    private ConfigDB $cdb;

    public function __construct() {
        $this->cdb = new configdb($this->truc);
        $this->cdb->loadFromFile();
    }

        public function connect(): PDO {

            $dsn = "mysql:host={$this->cdb->getHost()}; port={$this->cdb->getPort()};dbname={$this->cdb->getDB()};charset={$this->cdb->getCharset()}";

            $options = [
            PDO::ATTR_ERRMODE               =>   PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    =>   PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES      =>   false,
        ];

        try {
            $pdo = new PDO($dsn, $this->cdb->getUser(), $this->cdb->getMdp(), $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        } return $pdo;

}

}