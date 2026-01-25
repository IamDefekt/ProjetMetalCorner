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

    public function setidUser($idUser)                      { $this->idUser = (int)$idUser; }
    public function setUsername($username)                  { $this->username = $username; }
    public function setPassword($password)                  { $this->password = $password; }
    public function setEmail($email)                        { $this->email = $email; }
    public function setDateInscription($dateInscription)    { $this->dateInscription = $dateInscription; }


//------------------------Getter------------------------

    public function getidUser():int                 { return $this->idUser; }
    public function getUsername():string            { return $this->username; }
    public function getPassword():string            { return $this->password; }
    public function getEmail():string               { return $this->email; }
    public function getDateInscription():string     { return $this->dateInscription; }
}

?>