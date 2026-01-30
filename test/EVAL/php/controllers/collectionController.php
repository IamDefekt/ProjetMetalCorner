<?php

if (!empty($_POST['action'])) {

    // Mise à jour de la collection
    if ($_POST['action'] === 'update_collection') {
        $dao->update(
            $_POST['collection_id'],
            $_POST['label'],
            $_POST['description'],
            $_POST['type']
        );
    }

    // Suppression de la collection
    if ($_POST['action'] === 'delete_collection') {
        $dao->delete($_POST['collection_id']);
    }

}


}
