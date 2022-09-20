<aside class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas">
  <div class="offcanvas__body offcanvas-body d-flex flex-column">
    <div class="nav-menu nav-menu--offcanvas d-xl-none">
        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_class'     => 'nav-menu__list flex-column align-items-start',
                    'container_class' => 'nav-menu__container',
                )
            );
        ?>
    </div>
    <div class="nav-menu nav-menu--offcanvas">
        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'offcanvas',
                    'menu_class'     => 'nav-menu__list flex-column align-items-start',
                    'container_class' => 'nav-menu__container',
                )
            );
        ?>
    </div>
    <div class="offcanvas__social mt-auto">
        <?php get_template_part( 'template-parts/social-icons' ); ?>
    </div>
    <div class="offcanvas__language d-xl-none d-xxl-none mt-4">
        <?php get_template_part( 'template-parts/langswitcher' ); ?>
    </div>
  </div>
</aside>