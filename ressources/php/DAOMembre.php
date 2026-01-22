<?php

require_once __DIR__ . '/entiteMembre.php';
require_once __DIR__ . '/connect.php';

class DAOMembre {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Connect::cnx();
    }

    public function selectAll(): array {
        $membres = [];

        try {
            $stmt = $this->pdo->query('SELECT * FROM membres ORDER BY ASC');
        }
        catch(PDOException $e) {
            throw new PDOException ('Erreur de connexion à la base de données', 0, $e);
        }
        while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $membre = new entiteMembre();

            $membre->SetidUser($ligne['idUser']);
            $membre->SetPseudo($ligne['pseudo']);
            $membre->SetEmail($ligne['email']);
            $membre->SetMdp($ligne['mdp']);
            $membre->SetDateInscription($ligne['dateInscription']);

            $membres[] = $membre;
        }
        return $membres;
    }

// ----------- FONCTION POUR SELECTIONNER MEMBRE PAR SON EMAIL -----------

    public function selectMembrebyEmail(string $pseudo, string $email):array {
        $membres = [];
        $sql = 'SELECT * FROM membre WHERE pseudo LIKE :pseudo AND email LIKE :email;';

        try {
            $stmt = $this->pdo-prepare($sql);
            $stmt->execute([":pseudo" => $pseudo, ":email" => $email]);
            $membres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            throw new PDOException ('Erreur de connexion à la base de données', 0, $e);
        }
        while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $membre = new entiteMembre();

            $membre->setidUser($ligne['idUser']);
            $membre->setPseudo($ligne['pseudo']);
            $membre->setEmail($ligne['email']);
            $membre->setMdp($ligne['mdp']);
            $membre->setID($ligne['dateInscription']);

            $membres[] = $membre;
        }
        return $membres;
    }

// ----------- FONCTION POUR INSERER MEMBRER DANS BDD -----------

    public function insertData(entiteMembre $membre):bool {
        $sql = "
            INSERT INTO membres 
            (pseudo, email, mdp, dateInscription)
            VALUES (:pseudo, :email, :mdp, :dateInscription)
        ";

        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':pseudo'           => $membre->getPseudo(),
                ':email'            => $membre->getEmail(),
                ':mdp'              => $membre->getMdp(),
                ':dateInscription'  => date('Y-m-d')
            ]);
        }
        catch(PDOException $e) {
            throw new PDOException ("Erreur d'écriture dans la base de données", 0, $e);
            return false;
        }
    }

// ----------- FONCTION POUR MODIFIER MEMBRE DANS BDD -----------

    public function updateData (entiteMembre $membre):bool {
        $sql = "
            UPDATE membres SET
            pseudo = :pseudo,
            email = :email;
            mdp = :mdp;
            dateInscription = :dateInscription
            WHERE idUser = :idUser;
        ";

        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':idUser'           => (int)$membre->getidUser(),
                ':pseudo'           => $membre->getPseudo(),
                ':email'            => $membre->getEmail(),
                ':mdp'              => $membre->getMdp(),
                ':dateInscription'  => $membre->getDateInscription()
            ]);
        }
        catch (PDOException $e) {
            throw new PDOException("Erreur de mise à jour de la base de données", 0, $e);
            return false;
        }
    }

}