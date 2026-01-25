<?php

class entiteMembre {
    private int $idUser;
    private string $username; 
    private string $password;
    private string $email;
    private string $dateInscription;

    public function __construct(
        int $idUser = 0,
        string $username = '',
        string $email = '',
        string $password = '',
        string $dateInscription = ''
    ) {
        $this->idUser = $idUser;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->dateInscription = $dateInscription;
    }


//------------------------Setter------------------------

    public function setidUser($int $idUser): void                { $this->idUser = $idUser; }
    public function setUsername(string $username): void          { $this->username = $username; }
    public function setPassword(string $password): void          { $this->password = $password; }
    public function setEmail(string $email): void                { $this->email = $email; }
    public function setDateInscription($dateInscription):void    { $this->dateInscription = $dateInscription; }


//------------------------Getter------------------------

    public function getidUser():int                 { return $this->idUser; }
    public function getUsername():string            { return $this->username; }
    public function getPassword():string            { return $this->password; }
    public function getEmail():string               { return $this->email; }
    public function getDateInscription():string     { return $this->dateInscription; }
}

?>