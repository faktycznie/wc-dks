<?php

$contact_phone = foreto_get_option('contact_phone');
$contact_mail = foreto_get_option('contact_mail');

$download_pdf = foreto_get_option('download_pdf');

$languages = function_exists('pll_the_languages') ? pll_the_languages(array('raw' => 1)) : [];

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php get_template_part( 'template-parts/offcanvas' ); ?>

    <header class="header">
        <div class="container header__container">
            <div class="top-bar d-none d-xl-flex">
                <div class="top-bar__phone"><a class="top-bar__link" href="tel:<?= $contact_phone ?>"><?= $contact_phone ?></a></div>
                <div class="top-bar__email"><a class="top-bar__link" href="mailto:<?= $contact_mail ?>"><?= $contact_mail ?></a></div>
                <div class="top-bar__social">
                    <?php get_template_part( 'template-parts/social-icons' ); ?>
                </div>
                <?php if( count($languages) > 1 ) : ?>
                <div class="top-bar__lang">
                    <?php get_template_part( 'template-parts/langswitcher' ); ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="nav-bar d-flex align-items-center">
                <button class="offcanvas-btn hamburger"  data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"><span class="hamburger__inner"></span></button>

                <div class="nav-bar__logo logo">
                    <a class="logo__link" href="<?= get_site_url(); ?>"><img class="logo__image" src="<?= get_template_directory_uri() ?>/assets/img/logo.svg" alt="<?= get_bloginfo( 'name' ); ?>" /></a>
                </div>

                <div class="nav-bar__side ms-auto">
                    <div class="nav-bar__desktop align-items-center d-none d-xl-flex">
                        <nav class="nav-bar__menu nav-menu">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'menu-1',
                                        'menu_class'      => 'nav-menu__list',
                                        'container_class' => 'nav-menu__container',
                                        'depth'            => 1,
                                    )
                                );
                            ?>
                        </nav>

                        <div class="nav-bar__search">
                            <?php get_search_form(); ?>
                        </div>

                        <div class="nav-bar__catalog">
                            <a class="btn btn-primary btn--catalog" href="<?= $download_pdf ?>"><?= __('Pobierz katalog', 'foreto') ?></a>
                        </div>
                    </div>
                    <div class="nav-bar__mobile d-flex d-xl-none d-xxl-none mobile-icons">
                        <div class="mobile-icons__mail">
                            <a class="mobile-icons__link" href="mailto:<?= $contact_mail ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21.333" height="16" viewBox="0 0 21.333 16">
                                    <path id="email-line" d="M22,6H3.333A1.333,1.333,0,0,0,2,7.333V20.667A1.333,1.333,0,0,0,3.333,22H22a1.333,1.333,0,0,0,1.333-1.333V7.333A1.333,1.333,0,0,0,22,6ZM20.973,20.667H4.44L9.107,15.84l-.96-.927-4.813,4.98V8.347l8.287,8.247a1.333,1.333,0,0,0,1.88,0L22,8.14V19.807L17.093,14.9l-.94.94ZM4.207,7.333H20.92l-8.36,8.313Z" transform="translate(-2 -6)" fill="#242424"/>
                                </svg>
                            </a>
                        </div>
                        <div class="mobile-icons__phone">
                            <a class="mobile-icons__link" href="tel:<?= $contact_phone ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19.998" viewBox="0 0 20 19.998">
                                    <path id="Path_3411" data-name="Path 3411" d="M5.691,2.786a.848.848,0,0,0-1.268-.079L3.129,4a2.137,2.137,0,0,0-.561,2.21,21.958,21.958,0,0,0,5.21,8.261,21.96,21.96,0,0,0,8.261,5.209,2.139,2.139,0,0,0,2.21-.561l1.294-1.294a.848.848,0,0,0-.08-1.268L16.58,14.316a.848.848,0,0,0-.725-.153l-2.736.684a2.181,2.181,0,0,1-2.072-.574L7.977,11.2A2.181,2.181,0,0,1,7.4,9.13l.684-2.736a.848.848,0,0,0-.153-.725Zm-2.21-1.02a2.181,2.181,0,0,1,3.264.2L8.985,4.852A2.175,2.175,0,0,1,9.38,6.718L8.7,9.455a.848.848,0,0,0,.223.805l3.072,3.069a.848.848,0,0,0,.805.223l2.736-.684a2.181,2.181,0,0,1,1.868.395L20.281,15.5a2.181,2.181,0,0,1,.2,3.264l-1.294,1.294a3.474,3.474,0,0,1-3.6.878,23.291,23.291,0,0,1-8.761-5.525A23.291,23.291,0,0,1,1.31,6.654a3.475,3.475,0,0,1,.878-3.6L3.481,1.765Z" transform="translate(-1.124 -1.128)" fill="#242424" fill-rule="evenodd"/>
                                </svg>
                            </a>
                        </div>
                        <div class="mobile-icons__search">
                            <a class="mobile-icons__link" href="<?= get_search_link() ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <path id="ios-search" d="M24.265,23.045,18.7,17.433a7.928,7.928,0,1,0-1.2,1.218l5.526,5.576a.856.856,0,1,0,1.24-1.181ZM12.474,18.718A6.259,6.259,0,1,1,16.9,16.885,6.224,6.224,0,0,1,12.474,18.718Z" transform="translate(-4.5 -4.493)" fill="#242424"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <?php get_template_part( 'template-parts/dropdowns' ); ?>