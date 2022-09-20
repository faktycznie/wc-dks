<?php
/*
* Template Name: FAQ
*/

get_header();

$faq_items = get_terms(array(
  'taxonomy' => 'faq_cat',
  'hide_empty' => true,
));

?>
<div class="faq">
  <div class="faq__container container">
    <header class="faq__header">
      <h1 class="h2 faq__heading"><?php the_title() ?></h1>
    </header>
    <div class="faq__items mt-40 mb-40 mt-md-60 mb-md-60">
      <div class="row">
          <div class="col-12 col-md-3 d-none d-md-block">
            <ul class="nav nav-pills nav-pills--seo flex-column" id="seo" role="tablist">
              <?php 
              $i = 0;
              foreach($faq_items as $item) {
                $i++;
                $active = ( $i == 1 ) ? ' active' : '';
                $aria = ( $i == 1 ) ? 'true' : 'false';
              ?>
                <li class="nav-item nav-item--seo" role="presentation">
                  <button class="nav-link btn-link <?= $active ?> text-uppercase" id="faq-<?= $i ?>-tab" data-bs-toggle="tab" data-bs-target="#faq-<?= $i ?>" type="button" role="tab" aria-controls="faq-<?= $i ?>" aria-selected="<?= $aria ?>"><?= $item->name ?></button>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="col-12 col-md-9">
            <div class="tab-content">
              <?php 
              $j = 0;
              foreach($faq_items as $item) {
                $j++;
                $active = ( $j == 1 ) ? ' active' : '';
                $aria = ( $j == 1 ) ? 'true' : 'false';
                ?>
                <div class="tab-pane tab-pane--faq <?= $active ?>" id="faq-<?= $j ?>" role="tabpanel" aria-labelledby="faq-<?= $j ?>-tab">
                  <a href="#" class="d-md-none btn btn-link btn-collapse text-uppercase" data-bs-toggle="collapse" data-bs-target="#faq-acc-<?= $j ?>" aria-expanded="false" aria-controls="faq-acc-<?= $j ?>">
                    <?= $item->name ?>
                  </a>
                  <div class="collapse d-md-block" id="faq-acc-<?= $j ?>">
                    <?php 
                      $args = array(
                        'post_type' => 'faq',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                            'taxonomy' => 'faq_cat',
                            'field' => 'term_id',
                            'terms' => $item->term_id
                            )
                          )
                      );

                      $faq_query = new WP_Query( $args );
                      $p = 0;

                      if ( $faq_query->have_posts() ) { ?>
                        <div class="accordion" id="faq-accordion<?= $j ?>">
                        <?php while ( $faq_query->have_posts() ) : $faq_query->the_post(); $p++;
                            $acc_id = $item->term_id . '-' . get_the_ID();
                            $active = ( $p === 1 ) ? 'show' : '';
                            $aria = ( $p == 1 ) ? 'true' : 'false';
                            ?>
                            <div class="accordion-item">
                              <div class="accordion-header" id="faq-heading<?= $acc_id ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse<?= $acc_id ?>" aria-expanded="<?= $aria ?>" aria-controls="faq-collapse<?= $acc_id ?>">
                                  <?php the_title() ?>
                                </button>
                              </div>
                              <div id="faq-collapse<?= $acc_id ?>" class="accordion-collapse collapse <?= $active ?>" aria-labelledby="faq-heading<?= $acc_id ?>" data-bs-parent="#faq-accordion<?= $j ?>">
                                <div class="accordion-body">
                                  <?php the_content() ?>
                                </div>
                              </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                        </div>
                      <?php } ?>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<?php
get_footer();