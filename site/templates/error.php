<?php snippet('header') ?>

<main id="error" class="main black" role="main">

	<div class="text">
		<h1><?php echo $page->subtitle()->or($page->title()) ?></h1>
		<?php echo $page->text()->kirbytext() ?>
	</div>

</main>

<?php snippet('footer') ?>