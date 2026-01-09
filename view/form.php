<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métal Corner - Nous contacter</title>
    <link rel="stylesheet" href="/style/form.css">
    <script src="/scripts/form.js" type="module" defer></script>
</head>
<body>

    <?php include __DIR__ . '/components/navbar.php'; ?>

    <main>

        <h1 class="title">Nous Contacter</h1>
    
        <form class="form" id="contactForm">

            <label for="artistName" style="width:150px">Nom du/des artiste(s)</label>
            <input placeholder="Obligatoire" type="text" id="artistName" tabindex="1" required> 

            <span id='errorArtist' aria-live="polite"></span>

            <label for="dateConcert" style="width:113px">Date du concert</label>
            <input placeholder="Obligatoire" type="date" id="dateConcert" tabindex="2" required>

            <span id='errorDate' aria-live="polite"></span>

            <label for="LieuConcert" style="width:108px">Lieu du concert</label>
            <input placeholder="Obligatoire" type="text" id="LieuConcert" tabindex="3" required>

            <span id='errorPlace' aria-live="polite"></span>

            <label for="feedback" style="max-width:125px">Un p'tit message ?</label>
            <textarea name="feedback"></textarea>

            <button id="btn" type="button"/>Envoyer</button>

            <p id="message" aria-live="polite"></p>

        </form>

    </main>
    
    <?php include __DIR__ . '/components/footer.php'; ?>

</body>
</html>

