<?php 

class ConfigDB {
    private string $host;
    private string $db;
    private string $user;
    private string $mdp;
    private string $charset;
    private string $port;
    private string $fichier;

    public function __construct (
        string $fichier ) { 
            $this -> host = '';
            $this -> db = '';
            $this -> user = '';
            $this -> mdp = '';
            $this -> charset = 'utf8mb4';
            $this -> port = '';
            $this -> fichier = $fichier;
        }

    public function loadFromFile(): void {
        $config = parse_ini_file($this->fichier);

        $this -> host = $config['host'];
        $this -> db = $config['db'];
        $this -> user = $config['user'];
        $this -> mdp = $config['mdp'];
        $this -> charset = $config['charset'];
        $this -> port = $config['port'];
    }

    //getters

    public function getHost() { return $this -> host; }
    public function getPort() { return $this -> port; }
    public function getDB() { return $this -> db; }
    public function getUser() { return $this -> user; }
    public function getMdp() { return $this -> mdp; }
    public function getCharset() { return $this -> charset; }
    
}

?>