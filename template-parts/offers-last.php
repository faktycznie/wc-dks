<?php
  $link = ( !empty($args['link']) ) ? $args['link'] : '#contact';
  $title = ( !empty($args['title']) ) ? $args['title'] : __('<span>Umów się</span> na prezentację', 'foreto');
?>
<div class="d-none d-md-block h-100">
  <div class="card card--presentation border-0 h-100">
    <div class="card-body rounded-right overflow-hidden d-flex flex-column p-36">
      <h5 class="mt-auto card-title fc-white"><a href="<?= $link ?>" class="stretched-link"><?= $title ?></a></h5>
      <span class="arrow-long mt-3 fc-white"></span>
    </div>
  </div>
</div>
<div class="offers__button text-center d-md-none">
  <a class="btn btn-primary d-block" href="<?= $link ?>"><?= $title ?></a>
</div>