<?php 

//Objet permettant d'appliquer certaines règles "métiers" à nos données
//Crée le 20/01/2026 by Dorine

class Tools {

    //Fonction nettoyant les chaînes de caractères en supprimant les espaces avant et après, et en Capitalize
    public static function clearString(string $chaine): string {
        if (!isset($chaine))    return '';
        $chaine = trim($chaine);
        $chaine = strtolower($chaine);
        $chaine = ucwords($chaine);

        return $chaine;
    }
}


?>