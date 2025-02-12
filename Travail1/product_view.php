<?php 

ob_start();

// Connexion à la base de données
$mysqli = new mysqli("sql.decinfo-cchic.ca", "dev-2310197", "Zazou2468", "h25_web_transac_2310197", "33306");

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Échec de connexion à la base de données : " . $mysqli->connect_error);
}

// Récupération de l'ID du produit depuis l'URL
$id_produit = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Requête SQL pour récupérer les informations du produit
$sql = "SELECT * FROM tp1_produits WHERE Id = $id_produit";
$result = $mysqli->query($sql) or die("<b>Erreur SQL :</b><br>$sql<br>" . $mysqli->error);


if ($result->num_rows === 0) {
    echo "<p>Produit introuvable.</p>";
} else {
    $produit = $result->fetch_assoc();
?>

<div class="product-container">
    <h2 class="product-title"><?= htmlspecialchars($produit['Nom']) ?></h2>

    <div class="product-content">
        <div class="product-image">
            <img src="img/<?= htmlspecialchars($produit['Image']) ?>" alt="<?= htmlspecialchars($produit['Nom']) ?>">
        </div>

        <div class="product-info">
            <h3>Détails du produit</h3>
            <p>Quantité : <?= number_format($produit['Quantite'], 0) ?> <?= htmlspecialchars($produit['Unite']) ?></p>
            <p>Prix : <?= number_format($produit['Prix'], 2) ?> $</p>

            <form action="cart_process.php?action=add" method="post">
                <label for="quantity">Quantité :</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="10" required>
                <input type="hidden" name="id_produit" value="<?= $id_produit ?>">
                 <button type="submit" class="standard-button">Ajouter au panier</button>
            </form>
           

        </div>
    </div>
</div>

<?php
}
$result->close();
$mysqli->close();

$content = ob_get_clean();
require_once("includes/template.php");
?>
