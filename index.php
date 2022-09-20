<?php

get_header();

$blog_id = get_option( 'page_for_posts' );

$blog_heading = get_the_title($blog_id);
$blog_description = get_the_content(null, false, $blog_id);
$blog_image = get_the_post_thumbnail_url($blog_id);

get_template_part( 'template-parts/category-header', null, array(
  'category_heading'     => $blog_heading,
  'category_description' => $blog_description,
  'category_image'       => $blog_image,
  'section_class'        => 'mb-0',
) );

get_template_part( 'template-parts/loop' );

//get_template_part( 'template-parts/contact' );
get_template_part( 'template-parts/footer-seo' );

get_footer();
