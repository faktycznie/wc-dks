<?php 

$item = $args['item'];
$item_class = ( !empty($args['item_class']) ) ? $args['item_class'] : 'col-4';

if( !empty($item) ) :
?>
<div class="<?= $item_class ?>">
    <div class="card card--dropdown border-0 rounded-0 overflow-hidden">
        <?php
        $img_url = false;
        $img_field = get_field('image', $item);

        if( empty($img_field) ) {
          $term_id = ( !empty($item->object_id) ) ? $item->object_id : false;
          $thumb_id = get_term_meta($term_id, 'thumbnail_id', true);
          if( !empty($thumb_id) ) $img_url = wp_get_attachment_url( $thumb_id );
        } else {
          $img_url = $img_field['sizes']['dropdown'];
        }

        if( !empty($img_url) ) { ?>
            <div class="hover-zoom">
                <a href="<?= $item->url; ?>" class="stretched-link">
                    <img src="<?= $img_url ?>" class="card-img-top rounded-0" alt="<?= $item->title; ?>">
                </a>
            </div>
        <?php } ?>
        <div class="card-body px-0">
            <a href="<?= $item->url; ?>" class="card-text stretched-link arrow-right-link arrow-right-link--hidden"><?= $item->title; ?></a>
        </div>
    </div>
</div>
<?php endif; ?>