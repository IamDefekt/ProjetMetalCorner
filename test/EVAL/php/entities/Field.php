<?php

class entiteField {
    private int $id;
    private int $id_collection;
    private string $name;
    private string $label; 
    private string $type;
    private string $description;
    private int $minimum;
    private int $maximum;
    private int $length;
    private string $choiceList;
    private string $geometry;

    public function __construct() {
        $this->id = 0;
        $this->id_collection = 0;
        $this->name = '';
        $this->label = '';
        $this->type = '';
        $this->description = '';
        $this->minimum = 0;
        $this->maximum = 0;
        $this->length = 0;
        $this->choiceList = '';
        $this->geometry = '';
    }


//------------------------Setters------------------------

    public function setID(int $id)                             {$this->id = $id;}
    public function setID_collection(int $id_collection)       {$this->id_collection = $id_collection;}
    public function setName(string $name)                      {$this->name = $name;}
    public function setLabel (string $label)                   {$this->label = $label;}               
    public function setType(string $type)                      {$this->type = $type;}
    public function setDescription(string $description)        {$this->description = $description;}
    public function setMinimum(int $minimum)                   {$this->minimum = $minimum;}
    public function setMaximum(int $maximum)                   {$this->maximum = $maximum;}
    public function setLength(int $length)                     {$this->length = $length;}
    public function setChoiceList(string $choiceList)          {$this->choiceList = $choiceList;}
    public function setGeometry(string $geometry)              {$this->geometry = $geometry;}


//------------------------Getters------------------------

    public function getID():int                 {return $this->id;}
    public function getID_collection():int      {return $this->id_collection;}
    public function getName():string            {return $this->name;}
    public function getLabel():string           {return $this->label;}
    public function getType():string            {return $this->type;}
    public function getDescription():string     {return $this->description;}
    public function getMinimum():int            {return $this->minimum;}
    public function getMaximum():int            {return $this->maximum;}
    public function getLength():int             {return $this->length;}
    public function getChoiceList():string      {return $this->choiceList;}
    public function getGeometry():string        {return $this->geometry;}

}