<?php snippet('header') ?>

<main id="home" class="main" role="main">

	<div class="text">
		<h1><?php echo $page->subtitle()->or($page->title()) ?></h1>
		<?php echo $page->text()->kirbytext() ?>
	</div>

	<hr />

	<h2>Nouveauté</h2>

	<ul class="teaser cf">
		<?php foreach(page('products')->children()->visible()->flip()->limit(4) as $product): ?>
		<li>
			<h5 class="title"><a href="<?php echo $product->url() ?>"><?php echo $product->title()->html() ?></a></h5>
			<?php if($image = $product->images()->sortBy('sort', 'asc')->first()): ?>
			<a href="<?php echo $product->url() ?>"><?php echo thumb($image, array('width' => 300, 'height' => 300, 'crop' => true)); ?></a>
			<?php endif ?>
			<?php if($product->soldout() != 'true'): ?>
			<form method="post" action="<?php echo url('cart') ?>">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="id" value="<?php echo $product->uid() ?>">
				<h4 class="price cf">
					<button class="btn" type="submit" title="Ajouter au panier">+</button>
					<?php echo $site->currency_symbol() ?><?php echo $product->price() ?>
				</h4>
			</form>
			<?php else: ?>
			<h4 class="prix cf">
				<button class="btn-disabled" type="submit" disabled="" title="Indisponible">*</button>
				<?php echo $site->currency_symbol() ?><?php echo $product->price() ?>
			</h4>
			<?php endif ?>
		</li>
		<?php endforeach ?>
	</ul>

</main>

<?php snippet('footer') ?>