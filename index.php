<?php
get_header();

$theme = get_bloginfo("template_url") . '/dist';
?>

<main data-page="home">
  <section class="py-5">
    <div class="swiper banner">
      <div class="swiper-wrapper">
        <?php
        $banner_query = new WP_Query(array(
          'post_type' => 'post',
          'posts_per_page' => 10,
        ));

        if ($banner_query->have_posts()) {
          while ($banner_query->have_posts()) {
            $banner_query->the_post();
        ?>
            <div class="swiper-slide">
              <a href="<?php the_permalink(); ?>" class="d-block">
                <div class="ratio ratio-16x9">
                  <?php
                  if (has_post_thumbnail()) {
                  ?>
                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>" />
                  <?php
                  } else {
                  ?>
                    <img src="<?= $theme . '/image/thumb-fallback.png' ?>" alt="<?= the_title(); ?>" />
                  <?php
                  }
                  ?>
                </div>
              </a>
            </div>
        <?php
          }
        }
        ?>
      </div>
      <div class="swiper-navigation">
        <button class="slide-prev" type="button">
          <i data-feather="chevron-left"></i>
        </button>
        <button class="slide-next" type="button">
          <i data-feather="chevron-right"></i>
        </button>
      </div>
    </div>
  </section>
  <section class="bg-ilaese-gray">
    <div class="container pt-ilaese-64 pb-ilaese-80">
      <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10">
          <h2 class="fz-32 ff-playfair fw-bold text-ilaese-sixth mb-ilaese-32">
            <i class="fas fa-graduation-cap me-4"></i> Conheça nossos cursos
            de Formação Política à distância
          </h2>
          <a href="<?= get_option('link_courses', '#'); ?>" class="btn btn-ilaese-sixth rounded-0">
            <i class="fas fa-external-link-alt me-2"></i>
            <strong>Ir para Plataforma de cursos do ILAESE</strong>
          </a>
        </div>
      </div>
    </div>
  </section>
  <?php
  $courses_query = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => 'cursos',
    'posts_per_page' => 3
  ));

  if ($courses_query->have_posts()) {
  ?>
    <section>
      <div class="container pt-ilaese-80 pb-ilaese-40">
        <div class="row justify-content-center">
          <div class="col-md-11 col-lg-10">
            <div class="d-flex flex-column gapy-4">
              <h2 class="
                    fz-32
                    ff-playfair
                    fw-bold
                    text-ilaese-seventh
                    m-0
                    py-2
                    px-ilaese-32
                    bg-ilaese-seventh bg-opacity-10
                  ">
                <i class="fas fa-graduation-cap me-4"></i> Cursos
              </h2>
              <div class="row row-cols-1 row-cols-md-3 gapy-3">
                <?php
                while ($courses_query->have_posts()) {
                  $courses_query->the_post();
                ?>
                  <a href="<?php the_permalink(); ?>" class="col d-block" title="<?= the_title(); ?>">
                    <div class="ratio ratio-16x9">
                      <?php
                      if (has_post_thumbnail()) {
                      ?>
                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>" />
                      <?php
                      } else {
                      ?>
                        <img src="<?= $theme . '/image/thumb-fallback.png' ?>" alt="<?= the_title(); ?>" />
                      <?php
                      }
                      ?>
                    </div>
                  </a>
                <?php
                }
                ?>
              </div>
              <a href="<?= get_term_link('cursos', 'category'); ?>" class="
                    fw-bold
                    d-flex
                    flex-row
                    align-items-center
                    gapx-2
                    link-ilaese-seventh
                    text-decoration-none
                    ms-auto
                  ">
                Ver todos <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
  }
  ?>

  <?php
  $bulletin_query = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => 'boletim-contra-corrente',
    'posts_per_page' => 3
  ));

  if ($bulletin_query->have_posts()) {
  ?>
    <section>
      <div class="container py-ilaese-40">
        <div class="row justify-content-center">
          <div class="col-md-11 col-lg-10">
            <div class="d-flex flex-column gapy-4">
              <h2 class="
                    fz-32
                    ff-playfair
                    fw-bold
                    text-ilaese-sixth
                    m-0
                    py-2
                    px-ilaese-32
                    bg-ilaese-sixth bg-opacity-20
                  ">
                <i class="far fa-newspaper me-4"></i> Boletim Contra-Corrente
              </h2>
              <div class="row row-cols-1 row-cols-md-3 gapy-3">
                <?php
                while ($bulletin_query->have_posts()) {
                  $bulletin_query->the_post();
                ?>
                  <a href="<?php the_permalink(); ?>" class="col d-block" title="<?= the_title(); ?>">
                    <div class="ratio ratio-16x9">
                      <?php
                      if (has_post_thumbnail()) {
                      ?>
                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>" />
                      <?php
                      } else {
                      ?>
                        <img src="<?= $theme . '/image/thumb-fallback.png' ?>" alt="<?= the_title(); ?>" />
                      <?php
                      }
                      ?>
                    </div>
                  </a>
                <?php
                }
                ?>
              </div>
              <a href="<?= get_term_link('boletim-contra-corrente', 'category'); ?>" class="
                    fw-bold
                    d-flex
                    flex-row
                    align-items-center
                    gapx-2
                    link-ilaese-sixth
                    text-decoration-none
                    ms-auto
                  ">
                Ver todos <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
  }
  ?>


  <?php
  $studies_query = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => 'estudos-economicos',
    'posts_per_page' => 3
  ));

  if ($studies_query->have_posts()) {
  ?>
    <section>
      <div class="container pt-ilaese-40 pb-ilaese-80">
        <div class="row justify-content-center">
          <div class="col-md-11 col-lg-10">
            <div class="d-flex flex-column gapy-4">
              <h2 class="
                    fz-32
                    ff-playfair
                    fw-bold
                    text-ilaese-third
                    m-0
                    py-2
                    px-ilaese-32
                    bg-ilaese-third bg-opacity-20
                  ">
                <i class="fas fa-book me-4"></i> Estudos Econômicos
              </h2>
              <div class="row row-cols-1 row-cols-md-3 gapy-3">
                <?php
                while ($studies_query->have_posts()) {
                  $studies_query->the_post();
                ?>
                  <a href="<?php the_permalink(); ?>" class="col d-block" title="<?= the_title(); ?>">
                    <div class="ratio ratio-16x9">
                      <?php
                      if (has_post_thumbnail()) {
                      ?>
                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>" />
                      <?php
                      } else {
                      ?>
                        <img src="<?= $theme . '/image/thumb-fallback.png' ?>" alt="<?= the_title(); ?>" />
                      <?php
                      }
                      ?>
                    </div>
                  </a>
                <?php
                }
                ?>
              </div>
              <a href="<?= get_term_link('estudos-economicos', 'category'); ?>" class="
                    fw-bold
                    d-flex
                    flex-row
                    align-items-center
                    gapx-2
                    link-ilaese-third
                    text-decoration-none
                    ms-auto
                  ">
                Ver todos <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
  }
  ?>

  <section class="bg-ilaese-fourth">
    <div class="container py-ilaese-96">
      <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10">
          <div class="row gapy-3">
            <div class="col-md-6 col-lg-5">
              <div class="text-ilaese-black">
                <h2 class="mb-4 fz-32 ff-playfair fw-bold">
                  Inscreva-se na nossa newsletter e lista de transmissão!
                </h2>
                <p class="m-0">
                  Fique por dentro das novidades e notícias em primeira mão
                </p>
              </div>
            </div>
            <div class="col-md-6 ms-auto">
              <?= do_shortcode('[mc4wp_form id="30"]'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container py-ilaese-96">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-11 col-lg-10">
            <div class="d-flex flex-column gapy-ilaese-32">
              <div>
                <h2 class="mb-3 fz-24 ff-playfair fw-bold">Contato</h2>
                <div class="d-flex flex-row flex-wrap gapx-4 gapy-2">
                  <a href="<?= get_option('link_whatsapp', '#'); ?>" class="
                          btn btn-ilaese-green
                          fw-bold
                          text-white
                          rounded-0
                        ">
                    <i class="fab fa-whatsapp me-2"></i> <?= get_option('phone_whatsapp', '#'); ?>
                  </a>
                  <a href="mailto:<?= get_option('email', '#'); ?>" class="
                          btn btn-ilaese-third
                          fw-bold
                          text-white
                          rounded-0
                        ">
                    <i class="fas fa-envelope me-2"></i>
                    <?= get_option('email', '#'); ?>
                  </a>
                </div>
              </div>
              <div>
                <h2 class="mb-3 fz-24 ff-playfair fw-bold">
                  Redes sociais
                </h2>
                <div class="d-flex flex-row flex-wrap gapx-4 gapy-2">
                  <a href="<?= get_option('link_facebook', '#'); ?>" class="btn btn-ilaese-blue fw-bold text-white rounded-0">
                    <i class="fab fa-facebook me-2"></i> Facebook
                  </a>
                  <a href="<?= get_option('link_instagram', '#'); ?>" class="btn btn-ilaese-pink fw-bold text-white rounded-0">
                    <i class="fab fa-instagram me-2"></i>
                    Instagram
                  </a>
                  <a href="<?= get_option('link_youtube', '#'); ?>" class="btn btn-ilaese-red fw-bold text-white rounded-0">
                    <i class="fab fa-youtube me-2"></i>
                    Youtube
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>