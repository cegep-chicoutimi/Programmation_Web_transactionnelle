<?php
ob_start();
?>
<!-- Section avec une image rectangulaire et un cadre -->
<div class="container-fluid mt-4 d-flex justify-content-center">
  <div  style=" max-height: 400px; overflow: hidden;">
    <img src="img/v3.jpg" class="img-fluid w-100" style="height: 100%; object-fit: cover;" alt="Image rectangulaire avec cadre">
  </div>
</div>

<p> </p>
<h1 class="police_dauphinPlain">Nos produits classés par catégories</h1>

<p> </p>


<?php
$region_content = ob_get_clean();

require('includes/template.php');
?>
