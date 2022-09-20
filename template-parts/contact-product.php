<?php

$contact_heading = foreto_get_option('product_contact_heading');
$contact_description = foreto_get_option('product_contact_description');

?>
  <section class="contact pt-sm-40 pb-160 pb-sm-80">
    <div class="contact__container container-lg">

    <div class="contact__item card card--grey border-0 rounded-right overflow-hidden">
        <div class="card-body p-0">

          <header class="contact__title">
            <h2 class="contact__h2 h2 text-md-center px-0 px-md-5">
              <?= $contact_heading ?>
            </h2>
          </header>

          <p class="card-text fw-normal fc-inherit text-md-center mb-0"><?= $contact_description ?></p>

          <div class="contact__inner pt-md-5">
            <div class="row">
              <div class="col-12 col-md-6 contact__side py-5">
                <h3 class="h3 mb-3"><?= __('Twój wybór produktu:', 'foreto') ?></h3>
                <p class="card-text"></p>
              </div>

              <div class="col-12 col-md-6 contact__form">
                <div class="contact-form card card--contact border-0 rounded-right">
                  <div class="card-body p-3 p-md-5">
                  <?php echo do_shortcode('[contact-form-7 id="206"]'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
    </div>

      

    </div>
  </section>
