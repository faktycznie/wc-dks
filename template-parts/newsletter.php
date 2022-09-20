<?php

$newsletter_heading = __('Bądź SMART dowiedz się jak!', 'foreto');
$newsletter_description = __('Co miesiąc solidna dawka praktycznej
i inspirującej wiedzy! Zapisz się do naszego newslettera!', 'foreto');

?>
<div class="newsletter mt-80">
  <div class="card card--newsletter overflow-hidden">
      <div class="card-body">
        <div class="row gx-5">
          <div class="newsletter__col1 col-12 col-md-6">
            <h4 class="card-title"><span><?= $newsletter_heading ?></span></h4>
            <p class="h5 card-text p-0"><?= $newsletter_description ?></p>
          </div>
          <div class="newsletter__col2 col-12 col-md-6">
            <form class="newsletter__form">
              <div class="mb-3">
                <input class="form-control" type="text" name="email" placeholder="<?= __('Twoj email', 'foreto') ?>">
              </div>
              <button class="d-block w-100 btn btn-primary" type="submit"><?= __('Zapisz się', 'foreto') ?></button>
            </form>
          </div>
        </div>
      </div>
  </div>
  <div class="newsletter__bg bg bg--left">
    <svg xmlns="http://www.w3.org/2000/svg" width="25.865" height="51.731" viewBox="0 0 25.865 51.731">
      <path id="Path_3324" data-name="Path 3324" d="M964-235.317l25.865,25.865,25.865-25.865" transform="translate(235.317 1015.731) rotate(-90)" fill="#e2e2e2"/>
    </svg>
  </div>
  <div class="newsletter__bg bg bg--right">
    <svg xmlns="http://www.w3.org/2000/svg" width="74.227" height="147.039" viewBox="0 0 74.227 147.039">
      <path id="Path_3382" data-name="Path 3382" d="M964-235.317l73.166,73.166,61.734-61.734,11.432-11.432" transform="translate(-161.443 -963.646) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="1"/>
    </svg>
  </div>
</div>