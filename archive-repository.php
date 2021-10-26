<?php
get_header();

$theme = get_bloginfo("template_url") . '/dist';

$periods = get_terms('period');
$current_period = isset($_GET['period']) ? $_GET['period'] : end($periods)->slug;
$repository_query = new WP_Query(array(
  'post_type' => 'repository',
  'tax_query' => array(
    array(
      'taxonomy' => 'period',
      'field'    => 'slug',
      'terms'    => $current_period,
    ),
  ),
));
?>

<main>
  <section>
    <div class="container py-ilaese-32">
      <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
              <li class="breadcrumb-item active">Repositório</li>
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
              Repositório
            </h1>
            <div class="d-flex flex-column">
              <span>Repositório do ILAESE:</span>
              <span>
                Acesse nosso acervo de materiais disponíveis pra download!
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container pt-ilaese-32 pb-ilaese-128">
      <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10">
          <div>
            <nav class="overflowx-tabs">
              <div class="nav nav-tabs flex-nowrap" id="repo-tab">
                <?php
                foreach ($periods as $period) {
                ?>
                  <form action=".">
                    <input type="hidden" name="period" value="<?= $period->slug; ?>" />
                    <button type="submit" class="nav-link <?php if ($current_period === $period->slug) : echo 'active';
                                                          endif; ?>">
                      <?= $period->name; ?>
                    </button>
                  </form>
                <?php
                }
                ?>
              </div>
            </nav>
            <div>
              <div class="repo-list">
                <?php
                if ($repository_query->have_posts()) {
                  while ($repository_query->have_posts()) {
                    $repository_query->the_post();
                ?>
                    <a href="<?= get_field('link'); ?>" class="repo-item" download>
                      <i class="fas fa-file-pdf icon-pdf"></i>
                      <span>
                        <?= the_title(); ?>
                      </span>
                      <i class="fas fa-download icon-download"></i>
                    </a>
                <?php
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>