<?php snippet('header') ?>

<main class="main" role="main">

	<?php snippet('bags') ?>

	<div class="cf">
	<div class="infos">
		<h1><?php echo $page->title()->html() ?></h1>

		<ul class="meta cf">
			<?php if($site->tax() == 'true'): ?>
			<?php $total = floatval($page->price()->value) ?>
			<?php $tax = cart_vat($total, (string)$site->vat())?>
			<li><b>Prix:</b> <?php echo $site->currency_symbol() ?><?php printf('%0.2f', $total+$tax) ?><br /><small><b>TVA incluse de:</b> <?php echo $site->currency_symbol() ?><?php printf('%0.2f', $tax) ?></small></li>
			<?php else: ?>
			<li><b>Prix:</b> <?php echo $site->currency_symbol() ?><?php echo $page->price() ?></li>
			<?php endif ?>

			<?php if($page->soldout() == 'false'): ?>
			<li>
			<form method="post" action="<?php echo url('cart') ?>">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="id" value="<?php echo $page->uid() ?>">
				<button class="btn" type="submit">Ajouter au panier</button>
			</form>
			</li>
			<?php else: ?>
			<li><button class="btn-disabled" type="submit" disabled="">Indisponible</button></li>
			<?php endif ?>
		</ul>

		<div class="text">
			<?php echo $page->text()->kirbytext() ?>
		</div>
	</div>

	<div class="images">
		<?php foreach($page->images()->sortBy('sort', 'asc') as $image): ?>
		<figure>
			<img src="<?php echo $image->url() ?>" alt="<?php echo $page->title()->html() ?>">
		</figure>
		<?php endforeach ?>
	</div>
	</div>

	<?php snippet('prevnext', ['flip' => true]) ?>

</main>

<?php snippet('footer') ?>