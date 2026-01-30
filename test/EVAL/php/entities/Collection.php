<?php

class entiteCollection {
    private int $id;
    private string $label; 
    private string $description;
    private string $type;

    public function __construct() {
        $this->id = 0;
        $this->label = '';
        $this->description = '';
        $this->type = '';
    }


//------------------------Setters------------------------

    public function setID(int $id)                         {$this->id = $id;}
    public function setLabel(string $label)                {$this->label = $label;}                
    public function setDescription(string $description)    {$this->description = $description;}
    public function setType(string $type)                  {$this->type = $type;}


//------------------------Getters------------------------

    public function getID():int                 { return $this->id; }
    public function getLabel():string           { return $this->label; }
    public function getDescription():string     { return $this->description; }
    public function getType():string            { return $this->type; }
}