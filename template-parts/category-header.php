<?php

$cat_heading = $args['category_heading'];
$cat_description = $args['category_description'];
$cat_image = $args['category_image'];
$cat_class = ( !empty($args['section_class']) ) ? $args['section_class'] : 'mb-80 mb-md-160';

$cat_link = ( !empty($args['category_link']) ) ? $args['category_link'] : false;
$cat_parent = ( !empty($args['category_parent']) ) ? $args['category_parent'] : false;
$cat_gallery = ( !empty($args['category_gallery']) ) ? $args['category_gallery'] : false;

$cat_parent_class = ( empty($cat_parent) ) ? 'category-header--parent' : 'category-header--child';
$cat_gallery_class = ( !empty($cat_gallery) ) ? 'category-header__inner--gallery' : '';
?>

<div class="category-header <?= $cat_class ?> <?= $cat_parent_class ?>">
	<div class="category-header__bg-inner">
		<div class="category-header__container container">
			<div class="category-header__inner d-flex flex-column flex-md-row justify-content-between <?= $cat_gallery_class ?>">

				<header class="category-header__description order-2 order-md-1">
					<h1 class="h2 category-header__title mb-4"><?= $cat_heading ?></h1>
					
          <div class="term-description">
            <p><?= $cat_description ?></p>
          </div>

					<?php if($cat_link) : ?>
					<div class="category-header__button pt-5">
						<a class="btn btn-primary d-block d-sm-inline-block" href="<?= $cat_link ?>"><?= __('Sprawdź ofertę', 'foreto'); ?></a>
					</div>
					<?php endif; ?>
				</header>

				<?php if( ! $cat_parent ) : ?>
				<div class="category-header__arrow bg pe-5 d-none d-xxl-block order-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="224.621" height="446.414" viewBox="0 0 224.621 446.414">
						<path id="Path_3383" data-name="Path 3383" d="M964-235.317l222.5,222.5,222.5-222.5" transform="translate(-11.402 -963.293) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
					</svg>
				</div>
				<?php endif; ?>

				<?php if($cat_image || $cat_gallery) : ?>
				<div class="category-header__photo order-1 order-md-3 <?= $cat_gallery_class ?>">
						<?php if( $cat_gallery ) : ?>
							<div class="category-header__slider mb-4 mb-lg-0">
								<div class="category-header__swiper swiper">
									<div class="category-header__swiper-wrapper swiper-wrapper">
										<?php foreach( $cat_gallery as $item) :
											$item['thumbnail'] = $item['sizes']['realizations'];
											?>
											<div class="category-header__slide swiper-slide">
												<img src="<?= $item['thumbnail'] ?>" class="rounded-right" alt="" loading="lazy">
											</div>
										<?php endforeach; ?>
									</div>
									<div class="category-header__arrows category-header__arrows--prev swiper-button-prev"></div>
									<div class="category-header__arrows category-header__arrows--next swiper-button-next"></div>
								</div>
								<div class="category-header__pagination swiper-pagination swiper-pagination--orange mt-5"></div>
							</div>
						<?php else : ?>
							<img class="rounded-slider" src="<?= $cat_image ?>" alt="<?= $cat_heading ?>" loading="lazy">
						<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="category-header__bg bg bg--left">
		<?php if( ! $cat_parent ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" width="100.398" height="227.26" viewBox="0 0 100.398 227.26">
			<g id="Group_1605" data-name="Group 1605" transform="translate(-3988.239 -1871.133)">
				<path id="Path_3324" data-name="Path 3324" d="M964-235.317l49.8,49.8,49.8-49.8" transform="translate(3852.613 1034.799) rotate(90)" fill="#f47920"/>
				<path id="Path_3382" data-name="Path 3382" d="M964-235.317l98.277,98.277,98.276-98.277" transform="translate(3852.613 907.84) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
			</g>
		</svg>
		<?php else : ?>
			<svg xmlns="http://www.w3.org/2000/svg" width="176.232" height="416.69" viewBox="0 0 176.232 416.69">
				<g id="Group_1605" data-name="Group 1605" transform="translate(18.707 -435.961)">
					<path id="Path_3324" data-name="Path 3324" d="M0,116.436,116.436,0,232.872,116.436" transform="translate(114.11 619.779) rotate(90)" fill="#f5f5f5"/>
					<path id="Path_3325" data-name="Path 3325" d="M0,174.11,174.11,0,348.22,174.11" transform="translate(156.11 436.668) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
				</g>
			</svg>
		<?php endif; ?>
	</div>
	<?php if( ! $cat_parent ) : ?>
	<div class="category-header__bg bg bg--right">
		<svg xmlns="http://www.w3.org/2000/svg" width="176.231" height="349.634" viewBox="0 0 176.231 349.634">
			<path id="Path_3325" data-name="Path 3325" d="M964-235.317l174.11,174.11,174.11-174.11" transform="translate(236.024 1312.927) rotate(-90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
		</svg>
	</div>
	<?php endif; ?>
</div>