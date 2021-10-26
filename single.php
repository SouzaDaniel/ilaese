<?php
get_header();

$theme = get_bloginfo("template_url") . '/dist';
?>

<main data-page="single">
  <section>
    <div class="container py-ilaese-32">
      <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">
                <?= the_title(); ?>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container pb-4">
      <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10">
          <div>
            <h1 class="fw-bold ff-playfair fz-48 text-ilaese-black mb-5">
              <?= the_title(); ?>
            </h1>
            <?php
            if (has_post_thumbnail()) {
            ?>
              <div class="ratio ratio-16x9">
                <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>" />
              </div>
            <?php
            }
            ?>
            <div class="contents">
              <?php the_content(); ?>
            </div>
            <div class="d-flex flex-column pb-5 border-bottom border-ilaese-gray-fifth">
              <strong class="text-ilaese-black ff-playfair mb-3">
                Compartilhar:
              </strong>
              <div class="d-flex flex-row gapx-2">
                <a href="https://twitter.com/share?url=<?= urlencode(the_permalink()) ?>&text=<?= urlencode(the_title()) ?>" class="btn btn-ilaese-blue-second text-white p-ilaese-12 rounded-circle d-flex share">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="http://www.facebook.com/sharer/sharer.php?u=<?= urlencode(the_permalink()) ?>&t=<?= urlencode(the_title()) ?>" target="_blank" class="btn btn-ilaese-blue text-white p-ilaese-12 rounded-circle d-flex share">
                  <i class="fab fa-facebook"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container pt-4 pb-ilaese-128">
      <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10">
          <div class="row gapy-3">
            <?php
            if (get_previous_post()) {
            ?>
              <div class="col-10 col-md-6">
                <div class="d-flex flex-column">
                  <a href="<?= get_the_permalink(get_previous_post()); ?>" class="fw-bold link-ilaese-second text-decoration-none mb-3">
                    <i class="fas fa-chevron-left me-1"></i> Anterior
                  </a>
                  <h2 class="fw-bold fz-20 text-ilaese-black ff-playfair m-0">
                    <?= get_the_title(get_previous_post()) ?>
                  </h2>
                </div>
              </div>
            <?php
            }
            if (get_next_post()) {
            ?>
              <div class="col-10 col-md-6 ms-auto">
                <div class="d-flex flex-column text-end">
                  <a href="<?= get_the_permalink(get_next_post()); ?>" class="fw-bold link-ilaese-second text-decoration-none mb-3 ms-auto">
                    Próximo <i class="fas fa-chevron-right me-1"></i>
                  </a>
                  <h2 class="fw-bold fz-20 text-ilaese-black ff-playfair m-0">
                    <?= get_the_title(get_next_post()) ?>
                  </h2>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>