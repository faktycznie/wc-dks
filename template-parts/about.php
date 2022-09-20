<?php

$about_heading = get_field('about_heading');
$about_heading_type = get_field('about_heading_type') ? get_field('about_heading_type') : 'h2';
$about_items = get_field('about_items');
$about_items_heading_type = get_field('about_items_heading_type') ? get_field('about_items_heading_type') : 'h3';
$about_description = get_field('about_description');
$about_counters_heading = get_field('about_counters_heading');
$about_counters_heading_type = get_field('about_counters_heading_type') ? get_field('about_counters_heading_type') : 'h2';
$about_counters_items = get_field('about_counters_items');
$about_more_link = ( get_field('about_more_link') ) ? get_field('about_more_link') : '#contact';

if( !empty($about_items) ) {

?>
<section class="about pt-80 pb-80 pt-md-160 pb-md-160">
    <div class="about__container container">
        <header class="about_title pb-40 pb-md-80">
            <p class="about__subtitle subtitle text-md-center m-0"><?= __('DK SMART DESIGN', 'foreto'); ?></p>
            <<?=$about_heading_type?> class="about__h2 h2 text-md-center m-0">
                <?= $about_heading ?>
            </<?=$about_heading_type?>>
        </header>

    <div class="about__items">
        <div class="row row--first gx-0 gy-4 gy-lg-5">

            <div class="col-12 col-xl-5">
                <div class="about__item card card--grey border-0 rounded-right overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column align-items-center">
                        <p class="card-text"><?= $about_description ?></p>
                    </div>
                </div>
            </div>

            <?php 
            $i = 0;
            foreach($about_items as $item) { $i++;
                $item['heading_type'] = $about_items_heading_type;
                if($i === 3 ) echo '</div><div class="row row--second gx-0 gy-4 gy-lg-5 mt-0">';
            ?>
            <div class="col-12 col-xl">
                <?php get_template_part( 'template-parts/about', 'single', $item ); ?>
            </div>
            <?php } ?>

            <div class="col-12 col-xl-2">
                <div class="d-none d-lg-flex card h-100 card--presentation card--presentation-small border-0 rounded-right overflow-hidden">
                    <div class="card-body d-flex flex-column p-30">
                        <h5 class="mt-auto card-title fc-white"><a href="<?= $about_more_link ?>" class="stretched-link"><?= __('<span>Dowiedz się</span> więcej', 'foreto') ?></a></h5>
                        <span class="arrow-long mt-3 fc-white"></span>
                    </div>
                </div>
                <div class="d-lg-none about__button text-center">
                    <a class="btn btn-primary d-block" href="<?= $about_more_link ?>"><?= __('Zobacz więcej', 'foreto'); ?></a>
                </div>
            </div>

        </div>
    </div>
    <div class="about__counters d-none d-lg-block pt-160 pb-160 mx-auto">
        <div class="row">
            <div class="col-5">
                <p class="about__subtitle subtitle m-0"><?= __('DK SMART DESIGN', 'foreto'); ?></p>
                <<?=$about_counters_heading_type?> class="about__h2 h2 m-0">
                    <?= $about_counters_heading ?>
                </<?=$about_counters_heading_type?>>
            </div>
            <div class="col-7 d-flex">
                <div class="row">
                <?php foreach($about_counters_items as $item) { ?>
                    <div class="col px-4 about_counter counter">
                        <div class="counter__number"><?= $item['number'] ?></div>
                        <div class="counter__desc mt-2"><?= $item['desc'] ?></div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
  </div>
    <div class="about__bg bg bg--left">
        <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="164.817" height="325.846" viewBox="0 0 164.817 325.846">
            <g id="Group_1595" data-name="Group 1595" transform="translate(-2104.222 -1691.861)">
                <path id="Path_3324" data-name="Path 3324" d="M964-235.317l134.11,134.11,134.11-134.11" transform="translate(2370.246 2981.707) rotate(-90)" fill="#f5f5f5"/>
                <path id="Path_3327" data-name="Path 3327" d="M964-235.317l122.03,122.03,122.03-122.03" transform="translate(2340.246 2900.628) rotate(-90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
            </g>
        </svg>
        <svg class="d-md-none" xmlns="http://www.w3.org/2000/svg" width="22.263" height="41.698" viewBox="0 0 22.263 41.698">
            <path id="Path_3323" data-name="Path 3323" d="M0,20.142,20.142,0,40.284,20.142" transform="translate(20.849 0.707) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
        </svg>
    </div>
    <div class="about__bg bg bg--right">
        <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="98.121" height="193.414" viewBox="0 0 98.121 193.414">
            <path id="Path_3325" data-name="Path 3325" d="M964-235.317l96,96,96-96" transform="translate(-137.902 -963.293) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
        </svg>
        <svg class="d-md-none" xmlns="http://www.w3.org/2000/svg" width="60.093" height="141.865" viewBox="0 0 60.093 141.865">
            <g id="Group_1596" data-name="Group 1596" transform="translate(-317.614 -11.728)">
                <path id="Path_3309" data-name="Path 3309" d="M0,0,59.386,59.386,118.772,0" transform="translate(377 34.821) rotate(90)" fill="#f5f5f5"/>
                <path id="Path_3316" data-name="Path 3316" d="M0,0,43.162,43.162,86.324,0" transform="translate(377 12.436) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
            </g>
        </svg>
    </div>
</section>
<?php } ?>