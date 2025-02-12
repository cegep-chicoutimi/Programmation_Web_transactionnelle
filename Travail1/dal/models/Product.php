<?php
class Product
{
    public $id;
    public $name;
    public $quantity;
    public $unit;
    public $price;
    public $image;

    public function __construct($row)
    {
        $this->id = $row['Id'];
        $this->name = $row['Nom'];
        $this->quantity = $row['Quantite'];
        $this->unit = $row['Unite'];
        $this->price = $row['Prix'];
        $this->image = $row['Image'];
    }
}
