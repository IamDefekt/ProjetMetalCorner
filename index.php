<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métal Corner - Accueil</title>  
    <link rel="stylesheet" href="style/index.css"> 
</head>
<body>

    <?php include __DIR__ . '/view/components/navbar.php'; ?>

    <main id='main'>

        <section class="home">

            <h1>L'agenda participatif des concerts et festivals métal en Rhône-Alpes</h1>
        </section>

    <span class="sep"></span>


    <section class="cards">

        <div class="show">

            <h2>Prochains évènements</h2>

            <div class="live">

                <a href="#">20/01 - Electric Callboy @LDLC Arena</a>
                <a href="">12/03 - Gojira @Groupama Stadium</a>
                <a href="">18/03 - Amenra @Rock'n'Eat</a>
                <a href="">22/03 - Loudblast @Radiant</a>
                <a href="">25/03 - Perturbator @Ninkasi Kao</a>

            </div>

            <a class="btn" href="#">Voir tout les évènements</a>

        </div>

        <div class="lastAjout">

            <h2>Derniers évènements ajoutés</h2>

        </div>

    </section>

    <section class="cta">

        <h3>Tu connais un concert ou un festival qui n'est pas listé ?</h3>

        <a class="cta_btn" href="/view/form">Proposer un concert</a>

    </section>
        
    </main>
   
    <?php include __DIR__ . '/view/components/footer.php'; ?>


</body>
</html>

