<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métal Corner - Se connecter</title>
    <link rel="stylesheet" href="/style/login.css">
</head>
<body>

    <?php include __DIR__ . '/components/navbar.php'; ?>
    
    <main>

        <h1>Se Connecter</h1>

        <div class="form">
    
            <form id="connexionUser">

                <label style="width:98px">Adresse email</label>
                <input placeholder="Obligatoire" type="email" id="emailAdress" tabindex="1" required> 

                <label style="width:93px">Mot de passe</label>
                <input placeholder="Obligatoire" type="password" id="userPw" tabindex="2" required>

                <button id="btn" type="submit"/><a href="/view/compte.php">Se connecter</a></button>
            </form>

            <div class="reset">
                <a href="#">Mot de passe oublié ?</a>
            </div>

                <div class="signin">
                <a href="/view/signup.php">Vous n'avez pas encore de compte ?</a>
            </div>
        </div>
    </main>        
        
    <?php include __DIR__ . '/components/footer.php'; ?>

</body>
</html>

