<?php snippet('header') ?>

<main class="main" role="main">

	<?php snippet('bags') ?>

	<div class="cf">
	<div class="infos">
		<h1><?= $page->title()->html() ?></h1>

		<ul class="meta cf">
			<?php if($site->tax() == 'true'): ?>
			<?php $total = floatval($page->price()->value) ?>
			<?php $tax = cart_vat($total, (string)$site->vat())?>
			<li><b>Prix:</b> <span class="devise"><?php printf('%0.2f', $total+$tax) ?></span></li>
			<li><small><b>TVA incluse:</b> <span class="devise"><?php printf('%0.2f', $tax) ?></span></small></li>
			<?php else: ?>
			<li><b>Prix:</b> <span class="devise"><?= $page->price() ?></span></li>
			<?php endif ?>
		</ul>

		<div class="text">
			<?= $page->text()->kirbytext() ?>
		</div>

		<?php if($page->soldout() == 'false'): ?>
		<form method="post" action="<?= url('cart') ?>">
			<input type="hidden" name="action" value="add">
			<input type="hidden" name="id" value="<?= $page->uid() ?>">
			<button class="btn" type="submit">Ajouter au panier</button>
		</form>
		<?php else: ?>
		<button class="btn-disabled" type="submit" disabled="">Indisponible</button>
		<?php endif ?>
	</div>

	<div class="images">
		<?php foreach($page->images()->sortBy('sort', 'asc') as $image): ?>
		<figure>
			<a class="gallery" href="<?= $image->url() ?>">
				<?= thumb($image, array('width' => 600, 'height' => 600, 'crop' => true)); ?>
			</a>
		</figure>
		<?php endforeach ?>
	</div>
	</div>

	<?php snippet('prevnext', ['flip' => true]) ?>

</main>

<?php snippet('footer') ?>