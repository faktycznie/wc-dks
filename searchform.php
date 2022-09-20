<?php
$sid = uniqid('search');
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="form-group">
    <label for="<?= $sid; ?>" class="screen-reader-text"><?php echo _x( 'Szukaj:', 'foreto' ) ?></label>
    <input id="<?= $sid; ?>" type="search" class="form-control search-form__input"
        placeholder="<?php echo esc_attr__( 'Szukaj', 'foreto' ) ?>"
        value="<?php echo get_search_query() ?>" name="s"
        title="<?php echo esc_attr__( 'Szukaj:', 'foreto' ) ?>" />
    <button class="search-form__btn" type="submit" aria-label="<?php echo esc_attr__( 'Szukaj', 'foreto' ) ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="14.243" height="14.194" viewBox="0 0 14.243 14.194">
        <path id="ios-search" d="M18.033,17.2l-3.809-3.843a5.428,5.428,0,1,0-.824.834L17.184,18a.586.586,0,1,0,.849-.809ZM9.959,14.233a4.285,4.285,0,1,1,3.031-1.255A4.261,4.261,0,0,1,9.959,14.233Z" transform="translate(-4.25 -4.243)" fill="#f47920" stroke="#f47920" stroke-width="0.5"/>
      </svg>
    </button>
  </div>
</form>