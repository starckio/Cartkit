<?php s::remove('panier'); ?>
<?php snippet('header') ?>

<main id="paid" class="main black" role="main">

	<div class="text">
		<h1><?= $page->subtitle()->or($page->title()) ?></h1>
		<a class="btn-white" href="<?= url('products') ?>">Acheter à nouveau ?</a>
	</div>

</main>

<?php snippet('footer') ?>