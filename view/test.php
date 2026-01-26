<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style/test.css">
</head>
<body>

<?php include __DIR__ . '/components/navbar.php'; ?>

<div id="popup-edit">
    <div class="popup-content edit">

        <form action="compte.php" method="post">

            <div class="edition">

                <div class="editUserMdp">

                    <div class="editUser">

                        <h3>Modifier le nom d'utilisateur:</h3>

                        <div class="inputs">
                            <label for="username">Nouveau pseudo :</label>
                            <input type="username" name="username">
                        </div>
                    </div>

                    <div class="editMdp">
                        
                        <h3>Modifier le mot de passe : </h3>       

                        <div class="inputs">
                            <label for="actualPw">Mot de passe actuel :</label>
                            <input type="password" name="actualpw">

                            <label for="newPw">Nouveau mot de passe :</label>
                            <input type="password" name="newPw">

                            <label for="confirmNewPw">Confirmer le mot de passe :</label>
                            <input type="password" name="confirmNewPw">
                        </div>
                    </div>

                </div>

                <div class="editEmailPP">

                    <div class="inputs">
                        <h3>Modifier l'adresse email :</h3>
                        <label for="email">Nouvelle adresse email</label>
                        <input type="email" name="email">
                    </div>

                    <div class="editPP">
                        <h3>Modifier la photo de profil : </h3>
                        <img src="/ressources/media/pp.png" alt="">
                        <input type="file">
                    </div>

                </div>

            </div>    

            <div class="popup-btn ">
                <button type="submit" name="confirm-change" class="btn_red confirm-change">Enregistrer</button>
                <button class="btn_red cancel-change">Annuler</button>
            </div>  
        </form>

    </div>
</div>

</body>
</html>