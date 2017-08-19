<?php snippet('header') ?>

<main class="main" role="main">

	<?php snippet('bags') ?>

	<div class="text">
		<h1><?= $page->subtitle()->or($page->title()) ?></h1>
		<?= $page->text()->kirbytext() ?>
	</div>

	<hr>

	<ul class="teaser cf">
		<?php foreach($page->children()->visible()->flip() as $product): ?>
		<li>
			<h4 class="title"><a href="<?= $product->url() ?>"><?= $product->title()->html() ?></a></h4>
			<h3 class="prix devise"><?= $product->price() ?></h3>

			<?php $image = $product->cover_image()->toFile();
				if($image):
			?>
			<a href="<?= $product->url() ?>"><?= thumb($image, array('width' => 300, 'height' => 300, 'crop' => true)); ?></a>
			<?php endif ?>

			<?php if($product->soldout() == 'false'): ?>
			<form method="post" action="<?= url('cart') ?>">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="id" value="<?= $product->uid() ?>">
				<button class="btn" type="submit">Ajouter</button>
			</form>
			<?php else: ?>
			<button class="btn-disabled" type="submit" disabled="">Indisponible</button>
			<?php endif ?>

		</li>
		<?php endforeach ?>
	</ul>

</main>

<?php snippet('footer') ?>