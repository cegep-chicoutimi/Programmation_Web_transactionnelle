<?php
require_once(realpath(__DIR__ . '/../models/cartProduct.php'));
require_once(realpath(__DIR__ . '/base/FactoryBase.php'));


class CartProductFactory extends FactoryBase {

    /**
     * Génère ou récupère un token pour identifier le panier de l'utilisateur
     */
    public function getToken() {
        if (!isset($_COOKIE['cart_token'])) {
            $token = substr(uniqid(rand()), 0, 16);
            setcookie("cart_token", $token, time() + (86400 * 7), "/"); // pour dire que le cookie sera valide pour 7 jours 
        } else {
            $token = $_COOKIE['cart_token'];
        }
        return $token;
    }

    /**
     * Ajoute un produit au panier
     */
    public function addToCart($productId, $quantity) {
        $token = $this->getToken();
        $conn = $this->dbConnect();

        $query = "INSERT INTO tp1_panier (Token, ProduitId, Quantite) 
                  VALUES (?, ?, ?) 
                  ON DUPLICATE KEY UPDATE Quantite = Quantite + ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("siii", $token, $productId, $quantity, $quantity);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    /**
     * Supprime un produit du panier
     */
    public function removeFromCart($productId) {
        $token = $this->getToken();
        $conn = $this->dbConnect();

        $stmt = $conn->prepare("DELETE FROM tp1_panier WHERE Token = ? AND ProduitId = ?");
        $stmt->bind_param("si", $token, $productId);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>
