<?php

require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/Product.php'));

class ProductFactory extends FactoryBase
{
    public function getProductsByCategory($categoryId)
    {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM tp4_products WHERE CategoryId = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
