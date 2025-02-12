<?php
class cartProduct{

    public $id;
    public $productId;
    public $quantity;
    public $token;

    public function __construct($row){
        $this->id = $row['Id'];
        $this->productId = $row['ProduitId'];
        $this->quantity = $row['Quantite'];
        $this->token = $row['Token'];
    }
}

?>