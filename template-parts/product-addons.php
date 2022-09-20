<?php

$addons_heading = foreto_get_option('product_addons_heading');

$addons_items = array(
  array(
    'name' => 'YUTA',
    'image' => '',
    'url' => '',
  ),
  array(
    'name' => 'LEN',
    'image' => '',
    'url' => '',
  ),
  array(
    'name' => 'KRAFT',
    'image' => '',
    'url' => '',
  ),
);

$addons_tabs = array(
  array(
    'name'        => 'Okładki',
    'heading'     => 'Okładki ekologicznych kalendarzy książkowych ',
    'description' => 'W naszej linii eko, możesz wybierać spośród ogromnej bazy surowców, z których wykonana będzie okładka. Począwszy od ekologicznego papieru KRAFT dającego olbrzymie możliwości efektownej personalizacji Twojej okładki. Poprzez naturalne płótna w szerokiej gamie kolorystycznej – szczególnie polecamy kolory ziemi jak beże, brązy, soczystą zieleń aż po gustowny odcień mięty.  Skończywszy na okładkach, które wyglądem przypominają drewno, sklejkę, a nawet efektowny korek.',
    'items'       => $addons_items
  ),
  array(
    'name'        => 'Dodatki do okładki',
    'heading'     => 'Okładki ekologicznych kalendarzy książkowych ',
    'description' => '',
    'items'       => $addons_items
  ),
  array(
    'name'        => 'Blok',
    'heading'     => '',
    'description' => '',
    'items'       => $addons_items
  ),
);



?>
<div class="product-addons pt-160 pt-md-80 pb-160 pb-md-80">
  <div class="product-addons__container container">
  <div class="product-addons__items">

    <header class="product-addons__title">
      <h2 class="product-addons__h2 h2 text-md-center pb-5 m-0"><?= $addons_heading ?></h2>
    </header>

      <div class="product-addons__row row m-0">
        <div class="product-addons__col1 col-12 col-md-3 p-0">
          <ul class="nav nav-pills nav-pills--addons flex-column" id="product-addons" role="tablist">
            <?php 
            $i = 0;
            foreach($addons_tabs as $item) {
              $i++;
              $active = ( $i == 1 ) ? ' active' : '';
              $aria = ( $i == 1 ) ? 'true' : 'false';
            ?>
              <li class="nav-item nav-item--product-addons" role="presentation">
                <button class="nav-link btn-link <?= $active ?> text-uppercase" id="product-addons-<?= $i ?>-tab" data-bs-toggle="tab" data-bs-target="#product-addons-<?= $i ?>" type="button" role="tab" aria-controls="product-addons-<?= $i ?>" aria-selected="<?= $aria ?>"><?= $item['name'] ?></button>
              </li>
            <?php } ?>
          </ul>
        </div>
        <div class="product-addons__col2 col-12 col-md-9 p-0">
          <div class="product-addons__content">
            <div class="tab-content">
              <?php 
              $j = 0;
              foreach($addons_tabs as $item) {

                $j++;
                $active = ( $j == 1 ) ? ' active' : '';
                $aria = ( $i == 1 ) ? 'true' : 'false';
                ?>
                <div class="tab-pane tab-pane--product-addons <?= $active ?>" id="product-addons-<?= $j ?>" role="tabpanel" aria-labelledby="product-addons-<?= $j ?>-tab">
                  <button class="btn btn-link btn-collapse text-uppercase" data-bs-toggle="collapse" data-bs-target="#product-addons-acc-<?= $j ?>" aria-expanded="false" aria-controls="product-addons-acc-<?= $j ?>">
                    <?= $item['name'] ?>
                  </button>
                  <div class="collapse" id="product-addons-acc-<?= $j ?>">
                    <div class="product-addons__content-inner">
                      <?php if($item['heading']) : ?>
                      <h3 class="product-addons__tab-heading mb-3"><?= $item['heading'] ?></h3>
                      <?php endif; ?>

                      <?php if($item['description']) : ?>
                      <div class="product-addons__tab-desc mb-2">
                        <?= $item['description'] ?>
                      </div>
                      <?php endif; ?>

                      <?php 
                      if( !empty($item['items']) ) {
                        foreach($item['items'] as $child) {
                          get_template_part('template-parts/product-addons-single', null, $child);
                        }
                      }
                      ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="product-addons__nav d-none d-md-flex justify-content-between mt-5">
              <button class="btn btn-link arrow-left-link product-addons__btn product-addons__btn--prev"><?= __('Wstecz', 'foreto') ?></button>
              <button class="btn btn-primary product-addons__btn product-addons__btn--next"><?= __('Przejdź dalej', 'foreto') ?></button>
            </div>
          </div>
          <div class="product-addons__nav d-block d-md-none mt-5">
            <a href="#" class="btn btn-primary product-addons__btn d-block"><?= __('Prześlij zapytanie o produkt', 'foreto') ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


