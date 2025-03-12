

<!-- Section des catégories -->
<section class="container-fluid w-75 mx-auto my-5">
    <div class="row mt-4">
        <?php if (!empty($categories)) { ?>
            <?php foreach ($categories as $category) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <a href="nos_produits.php?categorie=<?= $category['Id']; ?>">
                            <img src="img-upload/<?= $category['Image']; ?>" class="card-img-top" alt="<?= htmlspecialchars($category['Name']); ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="nos_produits.php?categorie=<?= $category['Id']; ?>" class="text-decoration-none text-primary">
                                    <?= strtoupper(htmlspecialchars($category['Name'])); ?>
                                </a>
                            </h5>
                            <p class="card-text fs-3"><?= substr(htmlspecialchars($category['Description']), 0, 100); ?>...</p>
                            <!-- Bouton pour ouvrir la modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCategory<?= $category['Id']; ?>">
                                <i class="fas fa-info-circle"></i> En savoir plus
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal de description complète -->
                <div class="modal fade" id="modalCategory<?= $category['Id']; ?>" tabindex="-1" aria-labelledby="modalTitle<?= $category['Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-xl"> 
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title fw-bold text-uppercase" id="modalTitle<?= $category['Id']; ?>"><?= strtoupper(htmlspecialchars($category['Name'])); ?></h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-4 text-justify"><?= nl2br(htmlspecialchars($category['Description'])); ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        <?php } else { ?>
            <p class="text-center">Aucune catégorie trouvée.</p>
        <?php } ?>
    </div>
</section>

<!-- Section de type container-fluid (Jumbotron moderne) -->
<section class="container-fluid bg-light py-5 w-75 mx-auto my-5">
    <div class="container w-75 mx-auto px-4">
        <h1 class="display-4 fw-bold text-center">L'évolution des moyens de transport</h1>
        <p class="lead fs-3 text-justify">
            Depuis l’invention de la roue il y a plus de 5 000 ans, les moyens de transport n’ont cessé d’évoluer à une vitesse vertigineuse. 
            Autrefois limités aux charrettes et aux embarcations rudimentaires, les progrès technologiques ont permis le développement de véhicules de plus
            en plus performants et rapides.
        </p>
        <p class="fs-4 text-justify">
            La révolution industrielle du XIXe siècle a marqué un tournant décisif avec l’essor des chemins de fer et des navires 
            à vapeur, facilitant le transport de marchandises et de passagers sur de longues distances. Le XXe siècle a vu naître l’automobile, 
            l’aviation commerciale et le transport en commun modernisé, rendant les déplacements plus accessibles et confortables.
        </p>
    
    </div>
</section>