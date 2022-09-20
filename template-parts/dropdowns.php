<section class="dropdowns">
  <?php
    $dropdowns = foreto_get_menu_array('menu-1');
    foreach($dropdowns as $item) {
        if( !empty($item->children) ) {
            $name = sanitize_html_class(strtolower($item->title));
            $item_id = $name . '-' . $item->ID;
            $has_grand = false;
            foreach($item->children as $index => $child) {
                if( !empty($child->children) ) {
                    $has_grand = true;
                    break;
                }
            }
            ?>
            <div id="<?= $name; ?>" class="dropdown" data-id="<?= $item->ID; ?>">
                <div class="dropdown__container d-flex">
                    <?php if( $has_grand ) : ?>
                        <ul class="dropdown__column nav flex-column nav-pills col-3" id="<?= $item_id; ?>" role="tablist">
                        <?php foreach($item->children as $index => $child) {
                            $child_id = $item_id . '-' . $child->ID;
                            $child_active = ( $index === 0 ) ? 'active' : '';
                            ?>
                            <li class="nav-item" role="presentation">
                                <a href="<?= $child->url; ?>" class="nav-link <?= $child_active; ?> arrow-right arrow-right-link" id="<?= $child_id; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $child_id; ?>" role="tab" aria-controls="<?= $child_id; ?>"><?= $child->title; ?></a>
                            </li>
                        <?php } ?>
                        </ul>

                        <div class="dropdown__content tab-content col-9">
                            <?php foreach($item->children as $index => $child) {
                                $child_id = $item_id . '-' . $child->ID;
                                $grand_child = ( !empty($child->children) ) ? $child->children : false;
                                $grand_active = ( $index === 0 ) ? 'active' : '';

                                if( $grand_child ) { ?>
                                    <div class="tab-pane <?= $grand_active; ?>" id="<?= $child_id; ?>" role="tabpanel" aria-labelledby="<?= $child_id; ?>-tab">
                                        <div class="row g-2">
                                        <?php foreach($grand_child as $index => $grand) { ?>
                                            <?php get_template_part('template-parts/dropdowns', 'item', array(
                                                'item' => $grand
                                                )
                                            ); ?>
                                        <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php else : ?>
                        <div class="dropdown__content">
                            <div class="row g-2 flex-grow-1">
                                <?php foreach($item->children as $index => $child) { ?>
                                    <?php get_template_part('template-parts/dropdowns', 'item', array(
                                        'item' => $child,
                                        'item_class' => 'col-3'
                                        )
                                    ); ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endif ?>

                </div>
            </div>
        <?php } ?>
    <?php } ?>
</section>