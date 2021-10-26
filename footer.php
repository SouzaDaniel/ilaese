    <footer class="bg-ilaese-first">
      <div class="container py-ilaese-32">
        <div class="row align-items-center gapy-2">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="text-ilaese-fifth">
              <h5 class="fw-bold ff-playfair fz-14">
                ILAESE - Instituto Latino Americano de Estudos Socioeconômicos
                Vilva
              </h5>
              <div class="fz-12">
                Developed By Blossom Themes. Powered by WordPress
              </div>
            </div>
          </div>
          <div class="col-auto ms-auto">
            <div class="d-flex flex-row gapx-ilaese-32 fz-24">
              <a href="<?= get_option('link_facebook', '#'); ?>" class="link-ilaese-fifth text-decoration-none">
                <i class="fab fa-facebook"></i>
              </a>
              <a href="<?= get_option('link_instagram', '#'); ?>" class="link-ilaese-fifth text-decoration-none">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="<?= get_option('link_youtube', '#'); ?>" class="link-ilaese-fifth text-decoration-none">
                <i class="fab fa-youtube"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>

</html>