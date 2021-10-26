<?php
get_header();

$theme = get_bloginfo("template_url") . '/dist';
?>

<main>
  <section>
    <div class="container py-ilaese-32">
      <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= the_title(); ?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container pb-ilaese-32">
      <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10">
          <div>
            <h1 class="
                    fw-bold
                    ff-playfair
                    fz-48
                    text-ilaese-first
                    mb-ilaese-32
                  ">
              <?= the_title(); ?>
            </h1>
            <div class="contents about">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>