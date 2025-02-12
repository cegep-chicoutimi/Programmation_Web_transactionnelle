<?php
require_once "dal/factories/CartProductFactory.php";

// Initialisation de la classe CartProductFactory
$cartFactory = new CartProductFactory();

// Vérification de l'action reçue
if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (isset($_POST["id_produit"]) && isset($_POST["quantity"])) {
                $cartFactory->addToCart((int) $_POST["id_produit"], (int) $_POST["quantity"]);
            }
            break;

        case "remove":
            if (isset($_GET["id"])) {
                $cartFactory->removeFromCart((int) $_GET["id"]);
            }
            break;
    }
}

// Redirection après l'action
header("Location: cart_view.php");
exit;
?>
