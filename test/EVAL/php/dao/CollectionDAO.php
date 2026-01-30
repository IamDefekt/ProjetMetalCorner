<?php

require_once __DIR__ . '/../entities/Collection.php';
require_once __DIR__ . '/../lib/Database.php';

class CollectionDAO {

    // Connexion à l'aide du database.php 
    private PDO $pdo;

    public function __construct(){
        $this->pdo = Connect::connect();
    }

    // Fonction pour insérer des données dans la table collection
    public function insertData(entiteCollection $collection):bool {

        $sql = 'INSERT INTO collection 
        (label, description, type)
        VALUES (:label, :description, :type)';

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':label' => $collection->getLabel(),
            ':description' => $collection->getDescription(),
            ':type' => $collection->getType()
        ]);
        
    }

    // Fonction pour mettre à jour les données de la table collection
    public function updateData(entiteCollection $collection):bool {

        $sql = 'UPDATE collection SET
        label = :label,
        description = :description,
        type = :type
        WHERE id = :id';

            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                'id' => $collection->getID(),
                'label' => $collection->getLabel(),
                'description' => $collection->getDescription(),
                'type' => $collection->getType()
            ]);

        
    }

    // Fonction pour afficher toutes les données de la table collection
    public function selectAll():array {
        $collections = [];

        try {
            $stmt = $this->pdo->query('SELECT * FROM collection');
        } catch(PDOException $error) {
            throw new PDOException('Impossible de récupérer la collection.', 0, $error);
        } 
        
            while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $collection = new entiteCollection();

                $collection->setID($ligne['id']);
                $collection->setLabel($ligne['label']);
                $collection->setDescription($ligne['description']);
                $collection->setType($ligne['type']);

                $collections[] = $collection;
            }
        return $collections;
    }


    public function delete(int $id) {
    $stmt = $this->pdo->prepare(
        'DELETE FROM collection WHERE id = :id'
    );
    $stmt->execute(['id' => $id]);
}

public function selectById(int $id): ?entiteCollection {
    $stmt = $this->pdo->prepare('SELECT * FROM collection WHERE id = ?');
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $collection = new entiteCollection();
        $collection->setID($row['id']);
        $collection->setLabel($row['label']);
        $collection->setDescription($row['description']);
        $collection->setType($row['type']);
        return $collection;
    }
    return null;
}

}

?>



