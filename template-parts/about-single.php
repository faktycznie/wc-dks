<?php
$htype = ( !empty($args['heading_type']) ) ? $args['heading_type'] : 'h3';
?>
<div class="about-item card card--about overflow-hidden h-100">
    <div class="card-body">
        <div class="card-inner d-flex align-items-center mb-4">
            <?php if( !empty($args['icon']) ) : ?>
            <div class="card-icon">
                <img src="<?= $args['icon'] ?>" alt="<?= $args['title'] ?>">
            </div>
            <?php elseif( !empty($args['icon_svg']) ) : ?>
                 <div class="card-icon card-icon--svg">
                    <?php echo $args['icon_svg'] ?>
                 </div>
            <?php endif; ?>
            <<?=$htype?> class="card-title h4 mb-0">
                <?php if( !empty($args['link']) ) : ?>
                    <a class="arrow-right-link" href="<?= $args['link'] ?>">
                <?php endif; ?>
                <?= $args['title'] ?>
                <?php if( !empty($args['link']) ) : ?>
                    </a>
                <?php endif; ?>
            </<?=$htype?>>
        </div>
        <p class="card-text"><?= $args['description'] ?></p>
    </div>
</div>