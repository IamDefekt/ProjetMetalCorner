<?php

require_once __DIR__ . '/../entites/entiteMembre.php';
require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '/../controller/tools.php';

class DAOMembre {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Connect::cnx();
    }

// ----------- SELECTIONNER USER BY PSEUDO -----------

    public function selectMembrebyPseudo(string $pseudo):array {
        $membres = [];
        $sql = 'SELECT * FROM membre WHERE pseudo LIKE :pseudo';

        try {
            $stmt = $this->pdo-prepare($sql);
            $stmt->execute([":pseudo" => $pseudo]);

            while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $membre = new entiteMembre();

                $membre->setidUser($ligne['idUser']);
                $membre->setPseudo($ligne['pseudo']);
                $membre->setEmail($ligne['email']);
                $membre->setMdp($ligne['mdp']);
                $membre->setDateInscription($ligne['dateInscription']);

                $membres[] = $membre;
            }
        }
        catch(PDOException $e) {
            throw new PDOException ('Erreur de connexion à la base de données', 0, $e);
        }
        return $membres;
    }

// ----------- SELECTIONNER USER BY ID -----------

    public function selectMembreById(int $idUser): entiteMembre {
            $sql = "SELECT * FROM membre WHERE idUser = :idUser";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':idUser' => $idUser]);

            $ligne = $stmt->fetch(PDO::FETCH_ASSOC);

            $membre = new entiteMembre();
            $membre->setidUser($ligne['idUser']);
            $membre->setPseudo($ligne['pseudo']);
            $membre->setMdp($ligne['mdp']);
            $membre->setEmail($ligne['email']);
            $membre->setDateInscription($ligne['dateInscription']);

            return $membre;
    }

// ----------- INSERER USER DANS BDD -----------

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

// ----------- MODIFIER USER DANS BDD -----------

    public function updateData (entiteMembre $membre):bool {
        $sql = "
            UPDATE membre SET
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
                ':pseudo'           => Tools::clearString($membre->getPseudo()),
                ':email'            => strtolower($membre->getEmail()),
                ':mdp'              => $membre->getMdp(),
                ':dateInscription'  => $membre->getDateInscription()
            ]);
        }
        catch (PDOException $e) {
            throw new PDOException("Erreur de mise à jour de la base de données", 0, $e);
            return false;
        }
    }

// ----------- SUPPRIMER USER DANS BDD ----------- 

    public function deleteData (entiteMembre $membre): bool {
        $sql='
        DELETE FROM membre
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