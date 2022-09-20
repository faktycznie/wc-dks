<?php if( !empty($args['social_items']) ) : ?>
<ul class="social social--post">
<?php foreach($args['social_items'] as $item) :
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