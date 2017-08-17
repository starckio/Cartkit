<?php snippet('header') ?>

<main id="home" class="main" role="main">

	<?php snippet('bags') ?>

	<div class="text">
		<h1><?= $page->subtitle()->or($page->title()) ?></h1>
		<?= $page->text()->kirbytext() ?>
	</div>

</main>

<?php snippet('footer') ?>