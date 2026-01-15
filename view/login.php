<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métal Corner - Se connecter</title>
    <link rel="stylesheet" href="/style/login.css">
    <script src="/ressources/scripts/formSignInUp.js" defer></script>
</head>
<body>

    <?php include __DIR__ . '/components/navbar.php'; ?>
    
    <main>

        <h1>Se Connecter</h1>

        <div class="form">
    
            <form method="POST" action="/ressources/php/requete.php" id="login">

                <label style="width:101px">Adresse email</label>
                <input placeholder="Obligatoire" type="email" name="loginEmail" id="loginEmail" tabindex="1" required> 

                <span id="errorLogin"></span>

                <label style="width:95px">Mot de passe</label>
                <input placeholder="Obligatoire" type="password" name="loginPw" id="loginPw" tabindex="2" required>

                <button class="btn_red" type="submit">Se connecter</button>
            </form>

            <div class="reset">
                <a href="#">Mot de passe oublié ?</a>
            </div>

            <div class="signin">
                <a href="/view/signup.php">Vous n'avez pas encore de compte ?</a>
            </div>

            <?php
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<p class="error">Votre compte a été créé avec succès !</p>';
            } ?>

        </div>
    </main>        
        
    <?php include __DIR__ . '/components/footer.php'; ?>

</body>
</html>

