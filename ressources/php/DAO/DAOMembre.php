<?php

require_once __DIR__ . '/../entites/entiteMembre.php';
require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '/../controller/tools.php';

class DAOMembre {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Connect::cnx();
    }

// ----------- SELECTIONNER USER BY USERNAME -----------

    public function selectMembreByUsername(string $username): ?entiteMembre {
        $sql = 'SELECT * FROM membres WHERE username = :username LIMIT 1';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":username" => $username]);
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$ligne) {
            return null;
        }

        return new entiteMembre(
            $ligne['idUser'],
            $ligne['username'],
            $ligne['email'],
            $ligne['password'],
            $ligne['dateInscription']
        );
    }

// ----------- SELECTIONNER USER BY ID -----------

    public function selectMembreById(int $idUser): ?entiteMembre {
            $sql = "SELECT * FROM membres WHERE idUser = :idUser LIMIT 1";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':idUser' => $idUser]);
            $ligne = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$ligne) {
                return null; // User introuvable
            }

            return new entiteMembre(
                $ligne['idUser'],
                $ligne['username'],
                $ligne['email'],
                $ligne['password'],
                $ligne['dateInscription']
            );
    }

// ----------- CONNEXION D'UN USER -----------   

    public function loginByEmail(string $email, string $password): ?entiteMembre {
        $sql = "SELECT * FROM membres WHERE email = :email LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$ligne) {
            return null; // User introuvable
        }

        // Vérif du mdp
        if (!password_verify($password, $ligne['password'])) {
            return null; // Mdp incorrect
        }

        return new entiteMembre(
            $ligne['idUser'],
            $ligne['username'],
            $ligne['email'],
            $ligne['password'],
            $ligne['dateInscription']
        );
    }

// ----------- INSERER USER DANS BDD -----------

    public function insertData(entiteMembre $membre):bool {
        $sql = "
            INSERT INTO membres (username, email, password, dateInscription)
            VALUES (:username, :email, :password, NOW())
        ";

        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':username' => $membre->getUsername(),
                ':email' => $membre->getEmail(),
                ':password' => $membre->getPassword(),
            ]);
        }
        catch(PDOException $e) {
            throw new PDOException ("Erreur d'écriture dans la base de données", 0, $e);
        }
    }

// ----------- MODIFIER USER DANS BDD -----------

    public function updateData (entiteMembre $membre):bool {
        $sql = "
            UPDATE membres SET
            username = :username,
            email = :email,
            password = :password,
            dateInscription = :dateInscription
            WHERE idUser = :idUser;
        ";

        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':idUser' => (int)$membre->getidUser(),
                ':username' => Tools::clearString($membre->getUsername()),
                ':email' => strtolower($membre->getEmail()),
                ':password' => $membre->getPassword(),
                ':dateInscription' => $membre->getDateInscription()
            ]);
        }
        catch (PDOException $e) {
            throw new PDOException("Erreur de mise à jour de la base de données", 0, $e);
        }
    }

// ----------- SUPPRIMER USER DANS BDD ----------- 

    public function deleteData (entiteMembre $membre): bool {
        $sql='
        DELETE FROM membres
        WHERE idUser = :idUser;
        ';

        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([ ':idUser' => $membre->getidUser() ]);           
        } catch(PDOException $e) {
            throw new PDOException("Erreur de suppression dans la base de données", 0, $e);
        }
    }
}