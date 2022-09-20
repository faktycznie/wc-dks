<?php

$news_slider = ( !empty($args['news_slider']) ) ? 'news--slider' : '';
$img_size = ( !empty($args['img_size']) ) ? $args['img_size'] : 'news';
$news_heading_type = ( !empty($args['news_heading_type']) ) ? $args['news_heading_type'] : 'h2';
$news_items_heading_type = ( !empty($args['news_items_heading_type']) ) ? $args['news_items_heading_type'] : 'h3';

if( !empty($args['news']) ) {
?>
<section class="news <?= $news_slider ?> pb-80 pb-md-160">
  <div class="news__container container">

    <?php if( !empty($args['news_heading']) ) : ?>
    <header class="news_title mb-40 mb-md-80">
      <<?=$news_heading_type?> class="news__h2 h2 text-md-center m-0">
        <?= $args['news_heading'] ?>
      </<?=$news_heading_type?>>
    </header>
    <?php endif; ?>

    <div class="news__inner">
      <div class="news__items">
      <?php foreach($args['news'] as $item) {
        $item['thumbnail'] = ( !empty($item['photo']['sizes'][$img_size]) ) ? $item['photo']['sizes'][$img_size] : false;
        $item['heading_type'] = $news_items_heading_type;
        get_template_part( 'template-parts/news', 'single', $item );
      } ?>
      </div>
      <div class="news__pagination"></div>
    </div>
  </div>
</section>
<?php } ?>