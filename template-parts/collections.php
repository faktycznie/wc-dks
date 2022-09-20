<?php

$collections_heading = get_field('collections_heading');
$collections_heading_type = get_field('collections_heading_type') ? get_field('collections_heading_type') : 'h2';
$collections_items_heading_type = get_field('collections_items_heading_type') ? get_field('collections_items_heading_type') : 'h3';
$collections = get_field('collections');
$collections_link = get_field('collections_more_link');

if( !empty($collections) ) {
?>
<section class="collections pt-40 pb-40 pt-md-80 pb-md-80">
  <div class="collections__container container">

    <header class="collections_title pb-40 pb-md-40">
      <<?= $collections_heading_type ?> class="collections__h2 h2 text-md-center m-0">
        <?= $collections_heading ?>
      </<?= $collections_heading_type ?>>
    </header>

    <div class="collections__items">
      <div class="row gx-3 gy-5 gy-sm-4">
        <?php foreach($collections as $item) { ?>
          <div class="col-md-4">
          <?php 
          $item['thumbnail'] = $item['photo']['sizes']['collections'];
          $item['show_label'] = true;
          $item['heading_type'] = $collections_items_heading_type;
          get_template_part( 'template-parts/collections', 'single', $item );
          ?>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php if($collections_link) : ?>
    <div class="collections__button text-center pt-5">
      <a class="btn btn-primary d-block d-sm-inline-block" href="<?= $collections_link ?>"><?= __('Zobacz więcej', 'foreto'); ?></a>
    </div>
    <?php endif; ?>
  </div>
  <div class="collections__bg bg bg--left">
    <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="440.685" height="878.541" viewBox="0 0 440.685 878.541">
      <g id="Group_1593" data-name="Group 1593" transform="translate(-174.898 -1436.351)">
        <path id="Path_3309" data-name="Path 3309" d="M964-235.317l174.11,174.11,174.11-174.11" transform="translate(432.414 2892.264) rotate(-90)" fill="#fff"/>
        <path id="Path_3316" data-name="Path 3316" d="M964-235.317l438.564,438.563,438.563-438.563" transform="translate(410.922 3278.186) rotate(-90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
      </g>
    </svg>
    <svg class="d-md-none" xmlns="http://www.w3.org/2000/svg" width="27.263" height="51.698" viewBox="0 0 27.263 51.698">
      <path id="Path_3323" data-name="Path 3323" d="M0,25.142,25.142,0,50.284,25.142" transform="translate(25.849 0.707) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
    </svg>
  </div>
  <div class="collections__bg bg bg--right">
    <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="440.685" height="878.541" viewBox="0 0 440.685 878.541">
      <path id="Path_3323" data-name="Path 3323" d="M0,438.563,438.564,0,877.127,438.563" transform="translate(1.414 877.834) rotate(-90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
    </svg>
    <svg class="d-md-none" xmlns="http://www.w3.org/2000/svg" width="82.624" height="227.804" viewBox="0 0 82.624 227.804">
      <g id="Group_1594" data-name="Group 1594" transform="translate(-304.376 -29.204)">
        <path id="Path_3309" data-name="Path 3309" d="M0,0,82.624,82.624,165.248,0" transform="translate(387 91.76) rotate(90)" fill="#fff"/>
        <path id="Path_3316" data-name="Path 3316" d="M0,0,55.6,55.6,111.2,0" transform="translate(378.436 29.911) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
      </g>
    </svg>
  </div>
</section>
<?php } ?>