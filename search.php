<?php
get_header();

$theme = get_bloginfo("template_url") . '/dist';

$paged = get_query_var('page') ? get_query_var('page') : 1;

$posts_query = new WP_Query(array(
  'post_type' => 'post',
  'posts_per_page' => 10,
  'paged' => $paged,
  's' => get_search_query(),
));

$first = true;
?>

<main>
  <section>
    <div class="container py-ilaese-32">
      <div class="row justify-content-center">
        <div class="col-lg-11 col-xl-10">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
              <li class="breadcrumb-item active">Busca: “<?= get_search_query(); ?>”</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container pb-3">
      <div class="row justify-content-center">
        <div class="col-lg-11 col-xl-10">
          <div>
            <h1 class="fw-bold ff-playfair fz-48 text-ilaese-first m-0">
              Buscando por: “<?= get_search_query(); ?>”
            </h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container pb-ilaese-128 pt-3">
      <div class="row justify-content-center">
        <div class="col-lg-11 col-xl-10">
          <div class="
                  row row-cols-1 row-cols-md-2 row-cols-lg-3
                  gapy-ilaese-32
                  mb-ilaese-64
                ">
            <?php
            if ($posts_query->have_posts()) {
              while ($posts_query->have_posts()) {
                $posts_query->the_post();

                if ($first && $paged === 1) {
            ?>
                  <div class="w-100">
                    <div class="row gapy-2 mb-ilaese-32">
                      <div class="col-lg-7">
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
                      </div>
                      <div class="col-lg-5">
                        <div class="d-flex flex-column">
                          <span class="text-ilaese-gray-fifth fz-14 mb-2">
                            Atualizado em <time datetime="2008-02-14 20:00<?= get_post_time('Y-m-d H:i'); ?>"><?= get_post_time('d/m/Y'); ?></time>
                          </span>
                          <h2 class="ff-playfair fw-bold fz-24 text-ilaese-black mb-3">
                            <?php the_title(); ?>
                          </h2>
                          <div class="mb-ilaese-32 text-ilaese-gray-sixth">
                            <?php the_excerpt(); ?>
                          </div>
                          <a href="<?= the_permalink(); ?>" class="fw-bold d-flex flex-row align-items-center gapx-2 link-ilaese-second text-decoration-none">
                            Leia mais <i class="fas fa-chevron-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                } else {
                ?>
                  <div class="col">
                    <div class="d-flex flex-column gapy-3">
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
                      <span class="text-ilaese-gray-fifth fz-14 mb-2">
                        Atualizado em <time datetime="2008-02-14 20:00<?= get_post_time('Y-m-d H:i'); ?>"><?= get_post_time('d/m/Y'); ?></time>
                      </span>
                      <h2 class="ff-playfair fw-bold fz-20 text-ilaese-black m-0">
                        <?php the_title(); ?>
                      </h2>
                      <div class="text-ilaese-gray-sixth mb-3">
                        <?php the_excerpt(); ?>
                      </div>
                      <a href="<?= the_permalink(); ?>" class="
                        fw-bold
                        d-flex
                        flex-row
                        align-items-center
                        gapx-2
                        link-ilaese-second
                        text-decoration-none
                      ">
                        Leia mais <i class="fas fa-chevron-right"></i>
                      </a>
                    </div>
                  </div>
                <?php
                }
                ?>
            <?php
                if ($first) $first = false;
              }
            }
            ?>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="paginate">
                <?= paginate_links(array(
                  'base' => add_query_arg('page', '%#%'),
                  'total' => $posts_query->max_num_pages,
                  'current' => $paged,
                  'prev_text' => '<i class="fas fa-chevron-left"></i> ANTERIOR',
                  'next_text' => 'PRÓXIMA <i class="fas fa-chevron-right"></i>'
                )) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>