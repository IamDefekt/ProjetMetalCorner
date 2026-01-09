<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métal Corner - Créer mon compte</title>
    <link rel="stylesheet" href="/style/signup.css">
    <script src="/scripts/creationUser.js" defer></script>
</head>
<body>

    <?php include __DIR__ . '/components/navbar.php'; ?>

    <main>

        <!-- <h1 class="title"><span>Créer</span> mon compte<span style="visibility:hidden;">text</span></h1> -->

        <h1 class="title">Créer mon compte</h1>

        <form class="form" id="createAccount">

            <label for="name" style="width:122px">Nom d'utilisateur</label>
            <input placeholder="Obligatoire" type="username" id="username" tabindex="1" required> 

            <span id='errorUsername'></span>

            <label for="email" style="width:98px">Adresse email</label>
            <input placeholder="Obligatoire" type="email" id="emailAdress" tabindex="2" required> 

            <span id='errorMail' aria-live="polite"></span>

            <label for="password" style="width:93px">Mot de passe</label>
            <input placeholder="Obligatoire" type="password" id="userPw" tabindex="3" required>

            <span id='errorPw' aria-live="polite"></span>

            <label for="password" style="width:167px">Confirmer mot de passe</label>
            <input placeholder="Obligatoire" type="password" id="confirmPW" tabindex="4" required>

            <span id='errorPw2' aria-live="polite"></span>

            <div class="cgu">
                <input type="checkbox" name="cgu" id="cgu" style="width: 15px;">
                <p>J'accepte les conditions d'utilisation</p>
            </div>

            <span id='errorCgu' aria-live="polite"></span>

            <button id="btn" type="button"/>Créer mon compte</button>
        </form>

    </main>    
        
    <?php include __DIR__ . '/components/footer.php'; ?>

</body>
</html>

