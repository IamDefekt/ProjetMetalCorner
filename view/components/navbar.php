<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="/style/components/navbar.css"> 
    <script src="/ressources/scripts/main.js" type="module" defer></script>
</head>
<body>

    <header>
        <nav>

            <div class="nom">
                <a href="/index.php"><img src="/ressources/media/logo.png" alt="Logo Metal Corner chat"></a>
                <div class="titre">
                    <a href="/index.php"><p class="un">Metal</p>
                    <p class="deux">Corner</p></a>
                </div>
            </div>

            <button id="menuBurger" class="burger">
            <span></span>
            <span></span>
            <span></span>
            </button>

            <div class="liste" id="menu">
                <ul>
                    <li><a href="/index.php">Accueil</a></li>
                    <li><a href="/view/actus.php">Actualités</a></li>
                    <li><a href="#">Les concerts</a></li>
                    <li><a href="/view/login.php">Mon compte</a></li>
                    <li><a href="/view/about.php">A propos</a></li>
                    <li><a href="/view/form.php">Contact</a></li>
                </ul>

                <div class="search-theme">

                    <button id="search">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="#efefef"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                            >
                            <circle cx="10.5" cy="10.5" r="6.8" />
                            <path d="M15.8 15.8 L21 21" />
                        </svg>

                    </button>
                
                    <button id="toggle-theme" aria-label="Changer le thème">                        
                    <!-- LUNE -->
                        <svg
                            id="lune"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                        </svg>

                        <!-- SOLEIL -->
                        <svg
                            id="soleil"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                        </svg>
                    </button>

                </div>
                
            </div>
        </nav>
    </header>

</body>
</html>