<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métal Corner - Créer mon compte</title>
    <link rel="stylesheet" href="/style/signup.css">
    <script src="/ressources/scripts/login-create.js" defer></script>
</head>
<body>

    <?php include __DIR__ . '/components/navbar.php'; ?>

    <main>

        <h1>Créer mon compte</h1>

        <form method="POST" action="/ressources/php/requete.php" id="createAccount">

            <label for="name" style="width:125px">Nom d'utilisateur</label>
            <input placeholder="Obligatoire" type="text" name="username" id="createUser" tabindex="1"> 

            <span id='errorUsername'></span>

            <label for="email" style="width:101px">Adresse email</label>
            <input placeholder="Obligatoire" type="email" name="email" id="createEmail" tabindex="2"> 

            <span id='errorMail' aria-live="polite"></span>

            <label for="password" style="width:95px">Mot de passe</label>
            <input placeholder="Obligatoire" type="password" name="password" id="createPW" tabindex="3">

            <span id='errorPw' aria-live="polite"></span>

            <label for="password" style="width:186px">Confirmer le mot de passe</label>
            <input placeholder="Obligatoire" type="password" name="password2" id="confirmPW" tabindex="4">

            <span id='errorPw2' aria-live="polite"></span>

            <div class="cgu">
                <input type="checkbox" name="cgu" id="cgu" style="width: 15px;">
                <p>J'accepte les conditions générales d'utilisation</p>
            </div>

            <span id='errorCgu' aria-live="polite"></span>

            <button class="btn_red" type="submit">Créer mon compte</button>

            <span id='errorForm' aria-live="polite"></span>
        </form>

    </main>    
        
    <?php include __DIR__ . '/components/footer.php'; ?>

</body>
</html>

