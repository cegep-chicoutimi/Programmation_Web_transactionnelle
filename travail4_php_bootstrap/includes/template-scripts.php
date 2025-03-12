<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- Insérer vos balises <script> ici -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- Script pour synchroniser l'image et le texte -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    let carousel = document.getElementById('carouselExampleCaptions');
    let imageDisplay = document.getElementById('image-display');
    let imageCaption = document.getElementById('image-caption');
    let imageDescription = document.getElementById('image-description');

    carousel.addEventListener('slid.bs.carousel', function () {
      let activeItem = carousel.querySelector('.carousel-item.active img');
      let caption = carousel.querySelector('.carousel-item.active').getAttribute('data-caption');
      let description = carousel.querySelector('.carousel-item.active').getAttribute('data-description');

      // Met à jour l'image et le texte de la section en bas
      imageDisplay.src = activeItem.src;
      imageCaption.textContent = caption;
      imageDescription.textContent = description;
    });
  });
</script>