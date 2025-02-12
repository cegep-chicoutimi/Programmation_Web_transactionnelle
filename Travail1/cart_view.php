<?php 
require_once(realpath(__DIR__ . "/dal/DAL.php"));
require_once "dal/factories/CartProductFactory.php";

$title = "Votre panier d'achat";
ob_start();

// Initialisation du DAL pour interagir avec la BD
$dal = new DAL();
$cartFactory = new CartProductFactory();

// Récupération du token unique pour le panier de l'utilisateur
$token = $cartFactory->getToken();

// Connexion à la base de données
$conn = $cartFactory->dbConnect();

// Requête SQL sans alias pour récupérer les informations des produits du panier pour cet utilisateur
$query = "SELECT tp1_produits.Id, tp1_produits.Nom, tp1_produits.Image, 
                 tp1_produits.Quantite AS Stock, tp1_produits.Prix, 
                 tp1_panier.Quantite 
          FROM tp1_panier
          JOIN tp1_produits ON tp1_panier.ProduitId = tp1_produits.Id
          WHERE tp1_panier.Token = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

$totalCost = 0;
$cartItems = [];

while ($row = $result->fetch_assoc()) {
    $cartItems[] = $row;
    $totalCost += ($row["Quantite"] * $row["Prix"]);
}

$stmt->close();
$conn->close();
?>

<div class="cart-container">
    <h2>Votre panier d'achat</h2>

    <?php if (empty($cartItems)) : ?>
        <p>Aucun produit dans le panier.</p>
    <?php else : ?>
        <div class="cart-items">
            <?php foreach ($cartItems as $item) : ?>
                <div class="cart-item">
                    <div class="cart-image">
                        <img src="img/<?= htmlspecialchars($item['Image']) ?>" alt="<?= htmlspecialchars($item['Nom']) ?>">
                    </div>
                    <div class="cart-details">
                        <span class="cart-product-name"><?= htmlspecialchars($item['Quantite']) ?> x <?= htmlspecialchars($item['Nom']) ?></span>
                        <span class="cart-product-weight"><?= number_format($item['Stock'] * $item['Quantite'], 0) ?> g</span>
                        <span class="cart-product-price"><?= number_format($item['Quantite'] * $item['Prix'], 2) ?> $</span>
                        <a href="cart_process.php?action=remove&id=<?= $item['Id'] ?>" class="cart-remove">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <p class="cart-total">Coût total : <?= number_format($totalCost, 2) ?> $</p>
    <?php endif; ?>

    <a href="index.php" class="standard-button">Continuer votre magasinage</a>
</div>

<?php
$content = ob_get_clean();
require_once("includes/template.php");
?>
