<?php

$footer_slogan = foreto_get_option('footer_slogan');
$footer_address = foreto_get_option('footer_address');

$contact_phone = foreto_get_option('contact_phone');
$contact_phone2 = foreto_get_option('contact_phone2');
$contact_mail = foreto_get_option('contact_mail');

?>
    <footer class="footer">
        <div class="footer__container container">
            <div class="row gy-5">
                <div class="col-12 col-md-3">
                    <div class="footer__logo logo mb-4">
                        <a class="logo__link" href="<?= get_site_url(); ?>"><img class="logo__image" src="<?= get_template_directory_uri() ?>/assets/img/logo.svg" alt="<?= get_bloginfo( 'name' ); ?>" /></a>
                    </div>

                    <div class="footer__slogan fw-bolder mb-4"><?= $footer_slogan ?></div>
                    <div class="footer__address mb-4"><?= wpautop($footer_address) ?></div>
                    <div class="footer__contact d-flex flex-column mb-4">
                        <a class="footer__phone" href="tel:<?= $contact_phone ?>"><?= $contact_phone ?></a>
                        <a class="footer__phone2" href="tel:<?= $contact_phone2 ?>"><?= $contact_phone2 ?></a>
                        <a class="footer__mail" href="mailto:<?= $contact_mail ?>"><?= $contact_mail ?></a>
                    </div>

                    <div class="footer__social">
                        <?php get_template_part( 'template-parts/social-icons' ); ?>
                    </div>

                </div>
                <div class="col-12 col-md-6">
                    <nav class="footer__menu footer-menu">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'footer',
                                    'menu_class'      => 'footer-menu__list',
                                    'container_class' => 'footer-menu__container',
                                )
                            );
                        ?>
                    </nav>
                </div>
                <div class="col-12 col-md-3">
                    <nav class="footer__menu footer-menu footer-about">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'footer-about',
                                    'menu_class'      => 'footer-menu__list',
                                    'container_class' => 'footer-menu__container',
                                )
                            );
                        ?>
                    </nav>
                    <div class="footer__dmark mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="109.749" height="64.343" viewBox="0 0 109.749 64.343">
                            <g id="Group_1462" data-name="Group 1462" transform="translate(0 0)">
                                <g id="Group_1463" data-name="Group 1463" transform="translate(0 0)">
                                <path id="Path_3415" data-name="Path 3415" d="M120.574,2.789A5.505,5.505,0,0,0,118.21.723,8.1,8.1,0,0,0,114.7,0h-5.885V11.906H114.7a8.1,8.1,0,0,0,3.512-.723,5.505,5.505,0,0,0,2.364-2.066,5.839,5.839,0,0,0,.842-3.164,5.838,5.838,0,0,0-.842-3.163" transform="translate(-25.545 0)" fill="#ea7202"/>
                                <path id="Path_3416" data-name="Path 3416" d="M84.3,2.789A5.51,5.51,0,0,0,81.94.723,8.1,8.1,0,0,0,78.427,0H72.542V11.906h5.885a8.1,8.1,0,0,0,3.512-.723A5.51,5.51,0,0,0,84.3,9.117a5.839,5.839,0,0,0,.842-3.164A5.838,5.838,0,0,0,84.3,2.789" transform="translate(-17.03 0)" fill="#ea7202"/>
                                <path id="Path_3417" data-name="Path 3417" d="M120.574,71.313a5.505,5.505,0,0,0-2.364-2.066,8.1,8.1,0,0,0-3.512-.723h-5.885V80.43H114.7a8.1,8.1,0,0,0,3.512-.723,5.505,5.505,0,0,0,2.364-2.066,6.367,6.367,0,0,0,0-6.328" transform="translate(-25.545 -16.087)" fill="#f47920"/>
                                <path id="Path_3418" data-name="Path 3418" d="M84.3,71.313a5.51,5.51,0,0,0-2.364-2.066,8.1,8.1,0,0,0-3.512-.723H72.542V80.43h5.885a8.1,8.1,0,0,0,3.512-.723A5.51,5.51,0,0,0,84.3,77.641a6.367,6.367,0,0,0,0-6.328" transform="translate(-17.03 -16.087)" fill="#f47920"/>
                                <path id="Path_3419" data-name="Path 3419" d="M138.71,37.051a5.51,5.51,0,0,0-2.364-2.066,8.1,8.1,0,0,0-3.512-.723h-5.885V46.168h5.885a8.1,8.1,0,0,0,3.512-.723,5.51,5.51,0,0,0,2.364-2.066,6.367,6.367,0,0,0,0-6.328" transform="translate(-29.803 -8.043)" fill="#f47920"/>
                                <path id="Path_3420" data-name="Path 3420" d="M102.439,37.051a5.51,5.51,0,0,0-2.364-2.066,8.1,8.1,0,0,0-3.512-.723H90.677V46.168h5.885a8.1,8.1,0,0,0,3.512-.723,5.51,5.51,0,0,0,2.364-2.066,6.367,6.367,0,0,0,0-6.328" transform="translate(-21.288 -8.043)" fill="#69737a"/>
                                <path id="Path_3421" data-name="Path 3421" d="M66.168,37.051A5.505,5.505,0,0,0,63.8,34.985a8.1,8.1,0,0,0-3.512-.723H54.406V46.168h5.885a8.1,8.1,0,0,0,3.512-.723,5.505,5.505,0,0,0,2.364-2.066,6.367,6.367,0,0,0,0-6.328" transform="translate(-12.773 -8.043)" fill="#ea7202"/>
                                <path id="Path_3422" data-name="Path 3422" d="M120.574,2.789A5.505,5.505,0,0,0,118.21.723,8.1,8.1,0,0,0,114.7,0h-5.885V11.906H114.7a8.1,8.1,0,0,0,3.512-.723,5.505,5.505,0,0,0,2.364-2.066,5.839,5.839,0,0,0,.842-3.164,5.838,5.838,0,0,0-.842-3.163" transform="translate(-25.545 0)" fill="#f47920"/>
                                <path id="Path_3423" data-name="Path 3423" d="M84.3,2.789A5.51,5.51,0,0,0,81.94.723,8.1,8.1,0,0,0,78.427,0H72.542V11.906h5.885a8.1,8.1,0,0,0,3.512-.723A5.51,5.51,0,0,0,84.3,9.117a5.839,5.839,0,0,0,.842-3.164A5.838,5.838,0,0,0,84.3,2.789" transform="translate(-17.03 0)" fill="#f47920"/>
                                <path id="Path_3424" data-name="Path 3424" d="M48.033,2.789A5.51,5.51,0,0,0,45.669.723,8.1,8.1,0,0,0,42.156,0H36.271V11.906h5.885a8.1,8.1,0,0,0,3.512-.723,5.51,5.51,0,0,0,2.364-2.066,5.832,5.832,0,0,0,.842-3.164,5.832,5.832,0,0,0-.842-3.163" transform="translate(-8.515 0)" fill="#ea7202"/>
                                <path id="Path_3425" data-name="Path 3425" d="M11.762,2.789A5.505,5.505,0,0,0,9.4.723,8.1,8.1,0,0,0,5.885,0H0V11.906H5.885A8.1,8.1,0,0,0,9.4,11.183a5.505,5.505,0,0,0,2.364-2.066A5.833,5.833,0,0,0,12.6,5.953a5.832,5.832,0,0,0-.843-3.163" transform="translate(0 0)" fill="#ea7202"/>
                                <path id="Path_3426" data-name="Path 3426" d="M48.033,71.313a5.51,5.51,0,0,0-2.364-2.066,8.1,8.1,0,0,0-3.512-.723H36.271V80.43h5.885a8.1,8.1,0,0,0,3.512-.723,5.51,5.51,0,0,0,2.364-2.066,6.367,6.367,0,0,0,0-6.328" transform="translate(-8.515 -16.087)" fill="#f47920"/>
                                <path id="Path_3427" data-name="Path 3427" d="M11.762,71.313A5.505,5.505,0,0,0,9.4,69.247a8.1,8.1,0,0,0-3.512-.723H0V80.43H5.885A8.1,8.1,0,0,0,9.4,79.707a5.505,5.505,0,0,0,2.364-2.066,6.362,6.362,0,0,0,0-6.328" transform="translate(0 -16.087)" fill="#69737a"/>
                                <path id="Path_3428" data-name="Path 3428" d="M66.168,37.051A5.505,5.505,0,0,0,63.8,34.985a8.1,8.1,0,0,0-3.512-.723H54.406V46.168h5.885a8.1,8.1,0,0,0,3.512-.723,5.505,5.505,0,0,0,2.364-2.066,6.367,6.367,0,0,0,0-6.328" transform="translate(-12.773 -8.043)" fill="#f47920"/>
                                <path id="Path_3429" data-name="Path 3429" d="M29.9,37.051a5.51,5.51,0,0,0-2.364-2.066,8.1,8.1,0,0,0-3.512-.723H18.136V46.168h5.885a8.1,8.1,0,0,0,3.512-.723A5.51,5.51,0,0,0,29.9,43.379a6.367,6.367,0,0,0,0-6.328" transform="translate(-4.258 -8.043)" fill="#f47920"/>
                                <path id="Path_3430" data-name="Path 3430" d="M48.033,2.789A5.51,5.51,0,0,0,45.669.723,8.1,8.1,0,0,0,42.156,0H36.271V11.906h5.885a8.1,8.1,0,0,0,3.512-.723,5.51,5.51,0,0,0,2.364-2.066,5.832,5.832,0,0,0,.842-3.164,5.832,5.832,0,0,0-.842-3.163" transform="translate(-8.515 0)" fill="#69737a"/>
                                <path id="Path_3431" data-name="Path 3431" d="M11.762,2.789A5.505,5.505,0,0,0,9.4.723,8.1,8.1,0,0,0,5.885,0H0V11.906H5.885A8.1,8.1,0,0,0,9.4,11.183a5.505,5.505,0,0,0,2.364-2.066A5.833,5.833,0,0,0,12.6,5.953a5.832,5.832,0,0,0-.843-3.163" transform="translate(0 0)" fill="#f47920"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights">
            <div class="copyrights__container container">
                <div class="row">
                    <div class="col-12 col-md-3 order-1 order-md-0">
                        <?= __('Copyrights Grupa Infomax 2022', 'foreto'); ?>
                    </div>
                    <div class="col-12 col-md-9 order-0">
                        <nav class="copyrights__menu copy-menu">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'copyrights',
                                        'menu_class'      => 'copy-menu__list',
                                        'container_class' => 'copy-menu__container',
                                        'depth'            => 1,
                                    )
                                );
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>
