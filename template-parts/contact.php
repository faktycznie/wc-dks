<?php

$contact_heading = foreto_get_option('contact_heading');
$contact_description = foreto_get_option('contact_description');

$contact_form_heading = foreto_get_option('contact_form_heading');
$contact_form_description = foreto_get_option('contact_form_description');
$contact_form_phone = foreto_get_option('contact_phone');
$contact_form_phone2 = foreto_get_option('contact_phone2');
$contact_form_email = foreto_get_option('contact_mail');

$contact_form_id = ( !empty($args['contact_form_id']) )? $args['contact_form_id'] : foreto_get_option('contact_form_id');

?>
  <section id="contact" class="contact pt-40 pt-md-80 pb-40 pb-md-80">
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
              <div class="contact__row row">
                <div class="col-12 col-md-6 contact__side py-5">
                  <h3 class="h3 mb-3 mb-md-4"><?= $contact_form_heading ?></h3>
                  <p class="card-text"><?= $contact_form_description ?></p>
                  <div class="card-text contact__phone phone d-flex gap-3 align-items-center mb-3 mb-md-4">
                    <span class="phone__icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19.998" viewBox="0 0 20 19.998">
                        <path data-name="Path 3411" d="M5.691,2.786a.848.848,0,0,0-1.268-.079L3.129,4a2.137,2.137,0,0,0-.561,2.21,21.958,21.958,0,0,0,5.21,8.261,21.96,21.96,0,0,0,8.261,5.209,2.139,2.139,0,0,0,2.21-.561l1.294-1.294a.848.848,0,0,0-.08-1.268L16.58,14.316a.848.848,0,0,0-.725-.153l-2.736.684a2.181,2.181,0,0,1-2.072-.574L7.977,11.2A2.181,2.181,0,0,1,7.4,9.13l.684-2.736a.848.848,0,0,0-.153-.725Zm-2.21-1.02a2.181,2.181,0,0,1,3.264.2L8.985,4.852A2.175,2.175,0,0,1,9.38,6.718L8.7,9.455a.848.848,0,0,0,.223.805l3.072,3.069a.848.848,0,0,0,.805.223l2.736-.684a2.181,2.181,0,0,1,1.868.395L20.281,15.5a2.181,2.181,0,0,1,.2,3.264l-1.294,1.294a3.474,3.474,0,0,1-3.6.878,23.291,23.291,0,0,1-8.761-5.525A23.291,23.291,0,0,1,1.31,6.654a3.475,3.475,0,0,1,.878-3.6L3.481,1.765Z" transform="translate(-1.124 -1.128)" fill="#f47920" fill-rule="evenodd"/>
                      </svg>
                    </span>
                    <a class="phone__number" href="tel:<?= $contact_form_phone ?>"><?= $contact_form_phone ?></a>
                  </div>
                  <div class="card-text contact__phone phone d-flex gap-3 align-items-center mb-3 mb-md-4">
                    <span class="phone__icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19.998" viewBox="0 0 20 19.998">
                        <path data-name="Path 3411" d="M5.691,2.786a.848.848,0,0,0-1.268-.079L3.129,4a2.137,2.137,0,0,0-.561,2.21,21.958,21.958,0,0,0,5.21,8.261,21.96,21.96,0,0,0,8.261,5.209,2.139,2.139,0,0,0,2.21-.561l1.294-1.294a.848.848,0,0,0-.08-1.268L16.58,14.316a.848.848,0,0,0-.725-.153l-2.736.684a2.181,2.181,0,0,1-2.072-.574L7.977,11.2A2.181,2.181,0,0,1,7.4,9.13l.684-2.736a.848.848,0,0,0-.153-.725Zm-2.21-1.02a2.181,2.181,0,0,1,3.264.2L8.985,4.852A2.175,2.175,0,0,1,9.38,6.718L8.7,9.455a.848.848,0,0,0,.223.805l3.072,3.069a.848.848,0,0,0,.805.223l2.736-.684a2.181,2.181,0,0,1,1.868.395L20.281,15.5a2.181,2.181,0,0,1,.2,3.264l-1.294,1.294a3.474,3.474,0,0,1-3.6.878,23.291,23.291,0,0,1-8.761-5.525A23.291,23.291,0,0,1,1.31,6.654a3.475,3.475,0,0,1,.878-3.6L3.481,1.765Z" transform="translate(-1.124 -1.128)" fill="#f47920" fill-rule="evenodd"/>
                      </svg>
                    </span>
                    <a class="phone__number" href="tel:<?= $contact_form_phone2 ?>"><?= $contact_form_phone2 ?></a>
                  </div>
                  <div class="card-text contact__phone phone d-flex gap-3 align-items-center mb-3 mb-md-4">
                    <span class="phone__icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="21.333" height="16" viewBox="0 0 21.333 16">
                        <path d="M22,6H3.333A1.333,1.333,0,0,0,2,7.333V20.667A1.333,1.333,0,0,0,3.333,22H22a1.333,1.333,0,0,0,1.333-1.333V7.333A1.333,1.333,0,0,0,22,6ZM20.973,20.667H4.44L9.107,15.84l-.96-.927-4.813,4.98V8.347l8.287,8.247a1.333,1.333,0,0,0,1.88,0L22,8.14V19.807L17.093,14.9l-.94.94ZM4.207,7.333H20.92l-8.36,8.313Z" transform="translate(-2 -6)" fill="#f47920"/>
                      </svg>
                    </span>
                    <a class="phone__number" href="mailto:<?= antispambot($contact_form_email) ?>"><?= antispambot($contact_form_email) ?></a>
                  </div>

                  <div class="contact__social mt-40 mt-md-60">
                    <h5 class="contact__social-headeing mb-3 mb-md-4"><?= __('Pozostańmy w kontakcie:', 'foreto') ?></h5>
                    <?php get_template_part('template-parts/social-icons'); ?>
                  </div>
                </div>

                <?php if( $contact_form_id ) : ?>
                <div class="col-12 col-md-6 contact__form">
                  <div class="contact-form card card--contact border-0 rounded-right">
                    <div class="card-body p-3 p-md-5">
                    <?php echo do_shortcode('[contact-form-7 id="' . $contact_form_id . '"]'); ?>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
