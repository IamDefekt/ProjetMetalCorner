<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections</title>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <?php 
        require_once __DIR__ . '/php/dao/CollectionDAO.php';
        // require_once __DIR__ . '/php/dao/FieldDAO.php';

        $dao = new CollectionDAO();
        $tab = $dao->selectAll();
    ?>

    
    <main>
        <section>
            <!-- Affichage des données de la table collection -->
        
            <h2>Liste des collections</h2>

            <div class="tab_container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tab as $ligne): ?>
                            <tr>
                                <td><?= htmlspecialchars($ligne->getID()) ?></td>
                                <td><?= htmlspecialchars($ligne->getLabel()) ?></td>
                                <td><?= htmlspecialchars($ligne->getDescription()) ?></td>
                                <td><?= htmlspecialchars($ligne->getType()) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

<section>
    <h2>Modifier / Supprimer une collection</h2>

    <form method="post" action="">
        <!-- Sélection de la collection -->
        <label for="select-collection">
            Choisir la collection :
            <select name="collection_id" id="select-collection" onchange="this.form.submit()">
                <option value="">-- Sélectionner --</option>
                <?php foreach ($tab as $collection): ?>
                    <option value="<?= $collection->getID() ?>"
                        <?= (!empty($_POST['collection_id']) && $_POST['collection_id'] == $collection->getID()) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($collection->getLabel()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
    </form>

    <?php
    // Si une collection a été sélectionnée
    if (!empty($_POST['collection_id'])):
        $selected = $dao->selectById($_POST['collection_id']); // méthode à créer dans DAO
    ?>

    <form method="post" action="">
        <input type="hidden" name="collection_id" value="<?= $selected->getID() ?>">
        <input type="hidden" name="action" value="update_collection">

        <label>Label :
            <input type="text" name="label" value="<?= htmlspecialchars($selected->getLabel()) ?>">
        </label>
        <label>Description :
            <input type="text" name="description" value="<?= htmlspecialchars($selected->getDescription()) ?>">
        </label>
        <label>Type :
            <input type="text" name="type" value="<?= htmlspecialchars($selected->getType()) ?>">
        </label>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <form method="post" action="" onsubmit="return confirm('Confirmer la suppression ?')">
        <input type="hidden" name="collection_id" value="<?= $selected->getID() ?>">
        <input type="hidden" name="action" value="delete_collection">
        <button type="submit">Supprimer cette collection</button>
    </form>

    <?php endif; ?>
</section>





        <!-- Ajout d'une nouvelle collection dans la bdd -->
        <section>
            <form method='post' action="">
                <fieldset>
                    <legend>Ajout d'une nouvelle collection</legend>
                
                    <input type="hidden" name="action" value="add_collection">

                    <label>Label : <input type="text" name='collection_label'> </label>
                    <label>Description : <input type="text" name='collection_description'></label>
                    <label>Type : <input type="text" name='collection_type'></label>

                    <button type="button">Ajouter</button>
                </fieldset>
                

            </form>
        </section>

        <!-- Choisir la collection dans laquelle ajouter les champs -->
        <section>
            <form method='post' action="">  
                <fieldset class='addField'>
                    <legend>Ajouter des champs dans la collection</legend>
                    <fieldset>
                        <label>Choisissez la collection à modifier :
                            <select name="collection_id">
                                <?php foreach ($tab as $collection): ?>
                                    <option value="<?= $collection->getID() ?>"><?= htmlspecialchars($collection->getLabel()) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>   
                        <button type='button'>Valider</button>
                    </fieldset>

                    <fieldset class='fields'>
                        <label>Nom <input type="text" name="name"></label>
                        <label>Label <input type="text" name="label"></label>
                        <label>Type <input type="text" name='type'></label>
                        <label>Description <input type="text" name="description"></label>
                        <label>Minimum <input type="number" name="minimum"></label>
                        <label>Maximum <input type="number" name="maximum"></label>
                        <label>Longueur <input type="number" name="length"></label>            
                        <!-- <label>Choice List <input type="text" name="choiceList"></label> -->
                        <label>Geometry <input type="text" name="geometry"></label>
                    </fieldset>

                    <button type="button">Ajouter le champ</button>
                </fieldset>

                

            </form>

        </section>
    </main>
       
</body>
</html>