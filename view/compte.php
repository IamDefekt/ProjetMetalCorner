<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métal Corner - Mon compte</title>
    <link rel="stylesheet" href="/style/compte.css">
</head>
<body>

    <?php include __DIR__ . '/components/navbar.php'; ?>

    <main>

        <h1>Mon Compte</h1>

        <div class="ancre">
            <h3><a href="#infos">Informations personnelles</a></h3> 
            <h3><a href="#alertes">Mes alertes</a></h3>
            <h3><a href="#registered_events">évènements enregistrés</a></h3>
        </div>

        <span class="sep"></span>

        <div id="infos">

            <h3>Informations personnelles</h3>

            <div class="infos_perso">

                <div class="pp_pers">

                    <img src="/ressources/media/pp.png" alt="Photo de profil">

                    <div class="pers">
                        <?php require_once './../ressources/php/DAOMembre.php';

                        $c = new Connect();
                        $pdo = $c->connect();
                        $stmt = $pdo -> query ('SELECT * FROM membre where membre.pseudo = "youtopia" ');
                        $results = $stmt -> FetchAll();

                        foreach ($results as $row) {
                            ?> 
                            
                            <div class="php">
                                <span id="user"> <p>Nom d'utilisateur : </p> <?php echo "{$row['pseudo']}" ?> </span> 
                                <span id="mail"> <p>Adresse email : </p><?php echo "{$row['email']}"; ?> </span>
                            </div>
                        <?php } ?>
                    </div>

                </div>    
                
                <div class="btns">
                    <button class="btn_red" id="btn1">Modifier le profil</button>
                    <button class="btn_red" id="btn2">supprimer le compte</button>
                </div>

                <div id="popup-container">
                    <div class="popup-content">
                        <h3>Voulez-vous vraiment supprimer votre compte ?</h3>
                        <p>La suppression est définitive.</p>

                        <div class="popup-btn">
                            <button class="btn_red confirm">Supprimer</button>
                            <button class="btn_red cancel">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <span class="sep"></span>

        <div id="alertes">

            <h3>Mes Alertes</h3>

            <div class="artistes">

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/Architects.png" alt="Photo du groupe Architects">
                        <p>Architects</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/BadOmens.jpg" alt="Photo du groupe Bad Omens">
                        <p>Bad Omens</p>
                    </div>
                    <a class="btn_red"  id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/BlackVeilBrides.jpg" alt="Photo du groupe Black Veil Brides">
                        <p>Black Veil Brides</p>
                    </div>
                    <a class="btn_red"  id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/BMTH2.jpg" alt="Photo du groupe Bring me the Horizon">
                        <p>Bring me the Horizon</p>
                    </div>
                    <a class="btn_red" id="follow"  href="">Suivis</a>
                </div>

                            <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/Deftones.jpg" alt="Photo du groupe Deftones">
                        <p>Deftones</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/ElectricCallboy.webp" alt="Photo du groupe Electric Callboy">
                        <p>Electric Callboy</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/Eisbrecher.jpg" alt="Photo du groupe Eisbrecher">
                        <p>Eisbrecher</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/FIR.jpg" alt="Photo du groupe Falling in Reverse">
                        <p>Falling in Reverse</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/korn.jpg" alt="Photo du groupe KoRn">
                        <p>Korn</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/LinkinPark.jpg" alt="Photo du groupe Linkin Park">
                        <p>Linkin Park</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/LornaShore.jpg" alt="Photo du groupe Lorna Shore">
                        <p>Lorna Shore</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/MtS.jpg" alt="Photo du groupe Make them Suffer">
                        <p>Make them Suffer</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/mm.jpg" alt="Photo du groupe de Marilyn Manson">
                        <p>Marilyn Manson</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

                <div class="band">
                    <div class="img_name">
                        <img src="/ressources/media/bands/MIW.webp" alt="Photo du groupe Motionless in White">
                        <p>Motionless in White</p>
                    </div>
                    <a class="btn_red" id="follow" href="">Suivis</a>
                </div>

            </div>

            

        </div>

        <span class="sep"></span>

        <div id="registered_events">

            <h3>Mes évènements enregistrés</h3>

            <div class="events">

                <div class="show">
                    <p>10/12/2025 - Gojira @ LDLC Arena</p> 
                    
                    <svg id="heart" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" > 
                    <path d="M12 21s-6.716-4.35-10-9.5C-1.264 6.35 2.736 2 6.736 4.5 8.736 5.75 12 9 12 9s3.264-3.25 5.264-4.5c4-2.5 8 1.85 4.736 7-3.284 5.15-10 9.5-10 9.5z" fill="#4C1E1E"/>
                    </svg>
                </div>

                <div class="show">
                    <p>20/01/2026 - Electric Callboy @ LDLC Arena</p> 

                    <svg id="heart" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" > 
                    <path d="M12 21s-6.716-4.35-10-9.5C-1.264 6.35 2.736 2 6.736 4.5 8.736 5.75 12 9 12 9s3.264-3.25 5.264-4.5c4-2.5 8 1.85 4.736 7-3.284 5.15-10 9.5-10 9.5z" fill="#4C1E1E"/>
                    </svg>
                </div>
            </div>

        </div>

        <div class="logout">
            <a class="btn_red" href="/ressources/php/logout.php">Se déconnecter</a>
        </div>

    </main>
   
        
    <?php include __DIR__ . '/components/footer.php'; ?>

    <script>

        // MODIF PASSWORD

        // SUPPRESSION COMPTE

        const popup = document.getElementById('popup-container');
        const deletebtn = document.getElementById('btn2');
        const confirmbtn = document.querySelector('.confirm');
        const cancelbtn = document.querySelector('.cancel');

        deletebtn.addEventListener('click', () => {
        popup.classList.add('open');
        });

        cancelbtn.addEventListener('click', () => {
        popup.classList.remove('open');
        });

        confirmbtn.addEventListener('click', () => {
        window.location.href = 'suppression.php';
        })


        // ANIMATION FAVORIS 

        const heart = document.querySelector("#heart path");

        heart.addEventListener('click', () => {
          heart.classList.toggle('liked');
        });

    </script>

</body>
</html>

