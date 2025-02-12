<!-- Ici on gere l'acces aux infos de la BD -->
<?php
require_once(realpath(__DIR__ . '/../models/Product.php'));
require_once(realpath(__DIR__ . '/base/FactoryBase.php'));


class ProductFactory extends FactoryBase {
    public function getAllProducts() {
        $products = [];

        $db = $this->dbConnect();
        $sql = "SELECT * FROM tp1_produits ORDER BY Nom";
        $result = $db->query($sql);

        while ($row = $result->fetch_assoc()) {
            $products[] = new Product($row);
        }

        $result->close();
        $db->close();
        return $products;
    }

    public function getProductById($id) {
        $db = $this->dbConnect();
        $stmt = $db->prepare("SELECT * FROM tp1_produits WHERE Id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $product = null;
        
        if ($row = $result->fetch_assoc()) {
            $product = new Product($row);
        }

        $stmt->close();
        $db->close();
        return $product;
    }
}
?>
