<?php snippet('header') ?>

<?php snippet('cart') ?>

<main class="main" role="main">

  <div class="text">
    <h1><?php echo $page->title()->html() ?></h1>
    <?php echo $page->text()->kirbytext() ?>
  </div>

  <?php if($pages->find('about')->isOpen()): ?>
  <div class="twist">Just testing</div>
  <?php endif ?>

</main>

<?php snippet('footer') ?>