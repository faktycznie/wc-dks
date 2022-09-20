<?php
/*
* Template Name: Kontakt
*/

get_header();

$contact_heading = ( get_field('contact_heading', get_the_ID()) ) ? get_field('contact_heading', get_the_ID()) : get_the_title();
$contact_description = get_the_content();
$contact_features = get_field('contact_features', get_the_ID());

$contact_steps_heading = get_field('contact_steps_heading', get_the_ID());
$contact_steps = get_field('contact_steps', get_the_ID());
?>
<div class="page-about mb-80 mb-md-160">
  <div class="page-about__container container-lg">
    <div class="page-about__row d-flex flex-column flex-md-row justify-content-between">
      <div class="page-about__text d-flex flex-column justify-content-md-center">
        <header class="page-about__title mb-3">
          <h1 class="page-about__h1 h2 m-0">
              <?= $contact_heading ?>
          </h1>
        </header>
        <div class="page-about__content">
          <?= $contact_description ?>
        </div>
      </div>
      <?php if( $contact_features ) : ?>
      <div class="page-about__features features">
        <div class="row gx-3 gy-4 gy-md-3">
        <?php foreach($contact_features as $item) : ?>
          <div class="col-12 col-md-6">
            <?php get_template_part( 'template-parts/about-single', null, $item ); ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="page-about__bg bg bg--left">
    <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="223.688" height="370.298" viewBox="0 0 223.688 370.298">
      <g transform="translate(62.545 -92.367)">
        <path d="M0,97.74,97.74,0l97.74,97.74" transform="translate(161.143 267.185) rotate(90)" fill="#f5f5f5"/>
        <path d="M0,174.11,174.11,0,348.22,174.11" transform="translate(112.272 93.074) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
      </g>
    </svg>
  </div>
  <div class="page-about__bg bg bg--right">
    <svg xmlns="http://www.w3.org/2000/svg" width="158.064" height="298.544" viewBox="0 0 158.064 298.544">
      <g transform="translate(142.356 108.393) rotate(180)">
        <path d="M0,82.291,82.291,0l82.291,82.291" transform="translate(142.356 -56.189) rotate(90)" fill="#f5f5f5"/>
        <path d="M0,125.158,125.159,0,250.317,125.158" transform="translate(110.158 -189.444) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
      </g>
    </svg>
  </div>
</div>

<div class="contact-steps">
  <div class="contact-steps__container container-lg">
    <header class="contact-steps__title mb-3">
      <h2 class="contact-steps__h2 h4 m-0">
          <?= $contact_steps_heading ?>
      </h2>
    </header>

    <?php if( $contact_steps ) : ?>
    <div class="contact-steps__items">
      <div class="contact-steps__row row gx-3">
        <?php foreach($contact_steps as $item) : ?>
        <div class="contact-steps__col col-12 col-md-4">
          <div class="contact-steps__item">
            <div class="card card--contact-step overflow-hidden h-100">
                <div class="card-body">
                  <?php if( !empty($item['icon']) ) : ?>
                  <div class="card-icon mb-3">
                      <img src="<?= $item['icon'] ?>" alt="<?= $item['title'] ?>">
                  </div>
                  <?php elseif( !empty($item['icon_svg']) ) : ?>
                      <div class="card-icon card-icon--svg mb-3">
                          <?php echo $item['icon_svg'] ?>
                      </div>
                  <?php endif; ?>
                  <h5 class="d-inline card-title mb-0">
                    <?= $item['title'] ?>
                  </h5>
                </div>
                <?php if( !empty($item['link']) ) : ?>
                  <a class="stretched-link" href="<?= $item['link'] ?>"></a>
                <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
    <?php endif; ?>

  </div>
</div>

<?php
$contact_form_id = get_field('contact_form_id', get_the_ID());
get_template_part( 'template-parts/contact', null, array(
  'contact_form_id' => $contact_form_id
) );

$map_heading = get_field('map_heading', get_the_ID());
$map_description = get_field('map_description', get_the_ID());
$map_company_heading = get_field('map_company_heading', get_the_ID());
$map_company_description = get_field('map_company_description', get_the_ID());
$map_code = get_field('map_code', get_the_ID());
?>
<div class="map">
  <div class="map__container container-lg">
    <div class="map__row row gx-5 gy-3 align-items-md-center">
      <div class="map__content col-12 col-md-4">
        <h3 class="map__heading"><?= $map_heading ?></h3>
        <div class="map__description mb-4">
          <?= $map_description ?>
        </div>
        <h5 class="map__company-heading">
          <?= $map_company_heading ?>
        </h5>
        <div class="map__company-description">
          <?= $map_company_description ?>
        </div>
      </div>
      <div class="map__iframe col-12 col-md-8">
        <?= $map_code ?>
      </div>
    </div>
  </div>
</div>
<?php
$seo_items = get_field('seo_items');
get_template_part( 'template-parts/footer-seo', null, array(
  'ids' => $seo_items
) );

get_footer();