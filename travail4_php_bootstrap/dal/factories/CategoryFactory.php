<?php

require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/Category.php'));

class CategoryFactory extends FactoryBase
{

    // recuperer toutes les categories de la base de données
    public function getAllCategories()
    {
        $db = $this->dbConnect();
        $sql = "SELECT Id, Name, Description, Image FROM tp4_categories ORDER BY Name ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
