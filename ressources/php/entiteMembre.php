<?php

class entiteMembre {
    private int $idUser;
    private string $pseudo; 
    private string $mdp;
    private string $email;
    private string $dateInscription;

    public function __construct() {
        $this->idUser = 0;
        $this->pseudo = '';
        $this->mdp = '';
        $this->email = '';
        $this->dateInscription = '';
    }


//------------------------Setter------------------------

    public function setidUser($idUser)                      { $this->idUser = (int)$idUser; }
    public function setPseudo($pseudo)                      { $this->pseudo = $pseudo; }
    public function setMdp($mdp)                            { $this->mdp = $mdp; }
    public function setEmail($email)                        { $this->email = $email; }
    public function setDateInscription($dateInscription)    { $this->dateInscription = $dateInscription; }


//------------------------Getter------------------------

    public function getidUser():int                 { return $this->idUser; }
    public function getPseudo():string              { return $this->pseudo; }
    public function getMdp():string                 { return $this->mdp; }
    public function getEmail():string               { return $this->email; }
    public function getDateInscription():string     { return $this->dateInscription; }
}

?>