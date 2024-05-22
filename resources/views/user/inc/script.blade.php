<a href="{{ url("#") }}" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset("/assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/aos/aos.js") }}"></script>
  <script src="{{ asset("/assets/vendor/glightbox/js/glightbox.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/purecounter/purecounter_vanilla.js") }}"></script>
  <script src="{{ asset("/assets/vendor/swiper/swiper-bundle.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/php-email-form/validate.js") }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset("/assets/js/main.js") }}"></script>



<script>
  // Get the reply button
  var replyBtn = document.querySelector('.reply-btn');

  // Get the reply box
  var replyBox = document.querySelector('.reply-box');

  // Add click event listener to the reply button
  replyBtn.addEventListener('click', function() {
      // Toggle the display style of the reply box
      if (replyBox.style.display === 'none') {
          replyBox.style.display = 'block';
      } else {
          replyBox.style.display = 'none';
      }
  });
</script>