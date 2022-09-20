<?php
if( function_exists('pll_the_languages') ) :
$languages = pll_the_languages(array('raw' => 1));
  if( count($languages) > 1 ) :
?>
<ul class="language">
    <?php foreach ($languages as $lang) { ?>
        <li><a hreflang="<?= $lang['locale'] ?>" href="<?= $lang['url'] ?>"
                lang="<?= $lang['locale'] ?>"
                class="<?= ($lang['current_lang']) ? 'active' : '' ?>"><?= strtoupper($lang['slug']) ?></a>
        </li>
    <?php } ?>
</ul>
<?php
  endif;
endif;