<?php
$theme = get_bloginfo("template_url") . '/dist';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ilaese</title>

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <div class="bg-ilaese-fifth">
      <div class="container py-3">
        <div class="row justify-content-between align-items-center">
          <div class="col-auto">
            <img src="<?= $theme; ?>/image/logo.png" alt="logo" class="img-fluid" />
          </div>
          <div class="col-auto d-lg-none">
            <button class="hamburguer collapsed" data-bs-toggle="collapse" data-bs-target="#navigation-area">
              <div class="line"></div>
              <div class="line"></div>
              <div class="line"></div>
            </button>
          </div>
          <div class="col-lg-9 col-xl-8 align-self-center">
            <div class="collapse d-lg-block" id="navigation-area">
              <div class="row gapy-3 justify-content-between mt-3 mt-lg-0">
                <div class="col-lg-6">
                  <div class="d-flex h-100 align-items-center">
                    <?php
                    wp_nav_menu(
                      array(
                        'theme_location' => 'header_menu',
                        'container_class' => 'header_menu'
                      )
                    );
                    ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="
                        h-100
                        d-flex
                        align-items-center
                        flex-row
                        justify-content-between
                        flex-wrap
                        gapx-ilaese-32
                        gapy-3
                      ">
                    <form action="/">
                      <input class="input-search" placeholder="Pesquisar..." name="s" <?php if (is_search()) : ?> value="<?= get_search_query(); ?>" <?php endif; ?> />
                    </form>

                    <div class="d-flex flex-row gapx-3 ms-auto">
                      <a href="<?= get_option('link_facebook', '#'); ?>" class="
                            text-ilaese-third text-ilaese-second-hover
                            transition
                            text-decoration-none
                          ">
                        <i class="fab fa-facebook"></i>
                      </a>
                      <a href="<?= get_option('link_instagram', '#'); ?>" class="
                            text-ilaese-third text-ilaese-second-hover
                            transition
                            text-decoration-none
                          ">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <a href="<?= get_option('link_youtube', '#'); ?>" class="
                            text-ilaese-third text-ilaese-second-hover
                            transition
                            text-decoration-none
                          ">
                        <i class="fab fa-youtube"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-ilaese-third text-white ff-playfair fw-bold fz-14">
      <div class="container py-3">
        <div class="row">
          <div class="col">
            <div class="
                  d-flex
                  flex-wrap
                  justify-content-center
                  gapx-3
                  gapy-3
                  text-center
                ">
              <?php wp_nav_menu(
                array(
                  'theme_location' => 'after_header_menu',
                  'container_class' => 'after_header_menu'
                )
              );
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>