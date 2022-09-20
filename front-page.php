<?php

get_header();

get_template_part( 'template-parts/slider' );
get_template_part( 'template-parts/offers' );

$news_heading = get_field('news_heading');
$news_heading_type = get_field('news_heading_type');
$news = get_field('news');
$news_items_heading_type = get_field('news_items_heading_type');

get_template_part( 'template-parts/news', null, array(
  'news_heading'      => $news_heading,
  'news_heading_type' => $news_heading_type,
  'news'              => $news,
  'news_items_heading_type' => $news_items_heading_type,
  'news_slider'       => true //slider in mobile
) );

get_template_part( 'template-parts/collections' );
get_template_part( 'template-parts/about' );

$process_heading = foreto_get_option('process_heading');
$process_items = foreto_get_option('process_items');

get_template_part( 'template-parts/process', null, array(
  'process_heading' => $process_heading,
  'process_items' => $process_items
) );

$testimonial_items = get_field('testimonial_items');
get_template_part( 'template-parts/testimonials', null, array(
  'ids' => $testimonial_items
) );

get_template_part( 'template-parts/latest-blog' );
get_template_part( 'template-parts/contact' );

$seo_items = get_field('seo_items');
get_template_part( 'template-parts/footer-seo', null, array(
  'ids' => $seo_items
) );

get_footer();

?>