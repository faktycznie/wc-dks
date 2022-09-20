<?php

$social_icons = foreto_get_option('header_social');

if( !empty($social_icons) ) : ?>
<ul class="social">
<?php foreach($social_icons as $item) :
    $social_class = sanitize_html_class($item['name']);
    ?>
    <li class="social__item social__item--<?= $social_class ?>">
        <a class="social__link" href="<?= $item['link'] ?>">
            <?= $item['svg_icon'] ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>