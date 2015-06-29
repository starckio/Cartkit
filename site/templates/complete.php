<?php session_start(); ?>
<?php session_unset(); ?>
<?php session_destroy(); ?>
<?php $_SESSION = array(); ?>

<?php snippet('header') ?>

<main class="main" role="main">

  <div class="text">
    <h1><?php echo $page->subtitle()->or($page->title()) ?></h1>
    <?php echo $page->text()->kirbytext() ?>
  </div>

</main>

<?php snippet('footer') ?>