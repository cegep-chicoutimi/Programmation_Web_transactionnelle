<?php
require_once(realpath(__DIR__ . "/dal/DAL.php"));


$title = "Nos produits disponibles";
ob_start();

// Récupération des produits
$dal = new DAL(); 

$products = $dal->ProductFact()->getAllProducts();
?>

<div class="product-list">
    <?php foreach ($products as $product) : ?>
        <div class="product-item">
            <div class="product-image">
                <img src="img/<?= htmlspecialchars($product->image) ?>" alt="<?= htmlspecialchars($product->name) ?>">
            </div>
            <div class="product-name"><?= htmlspecialchars($product->name) ?></div>
            <a href="product_view.php?id=<?= $product->id ?>" class="standard-button">Voir l'article</a>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
require_once("includes/template.php");
?>
