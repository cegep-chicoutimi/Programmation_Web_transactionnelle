<?php
ob_start();

require_once(realpath(__DIR__ . '/dal/DAL.php'));

$dal = new DAL();
$categories = $dal->CategoryFact()->getAllCategories();

ob_start();

include("includes/index-carousel.php");
include("includes/index-cards.php"); // Inclusion des cartes de catégories
$region_content = ob_get_clean();

require('includes/template.php');
?>
