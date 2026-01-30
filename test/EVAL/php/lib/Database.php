
<?php

// Utilisée pour se connecter à la bdd à partir du fichier database.conf
class Connect {
    
    public static function connect(string $fichier = __DIR__ . '/../../config/database.conf'): PDO {        
  
        $config = parse_ini_file($fichier);

        // Erreur si le fichier ne peut être lu
        if ($config === false) {
            throw new RuntimeException("Erreur lors de la lecture du fichier de configuration");
        }

        $dsn = "mysql:host={$config['host']};
                port={$config['port']};
                dbname={$config['db']};
                charset=utf8mb4";

        return new PDO(
            $dsn,
            $config['user'],
            $config['mdp'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
        
    }   

}