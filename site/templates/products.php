<?php snippet('header') ?>

<main class="main" role="main">

	<?php snippet('bags') ?>

	<div class="text">
		<h1><?php echo $page->subtitle()->or($page->title()) ?></h1>
		<?php echo $page->text()->kirbytext() ?>
	</div>

	<hr>

	<ul class="teaser cf">
		<?php foreach($page->children()->visible()->flip() as $product): ?>
		<li>
			<h4 class="title"><a href="<?php echo $product->url() ?>"><?php echo $product->title()->html() ?></a></h4>
			<?php if($site->tax() == 'true'): ?>
			<?php $total = floatval($product->price()->value) ?>
			<?php $tax = cart_vat($total, (string)$site->vat())?>
			<h3 class="prix"><?php echo $site->currency_symbol() ?><?php printf('%0.2f', $total+$tax) ?></h3>
			<?php else: ?>
			<h3 class="prix"><?php echo $site->currency_symbol() ?><?php echo $product->price() ?></h3>
			<?php endif ?>
			
			<?php $image = $product->cover_image()->toFile();
				  if($image):
			?>
			<a href="<?php echo $product->url() ?>"><?php echo thumb($image, array('width' => 300, 'height' => 300, 'crop' => true)); ?></a>
			<?php endif ?>

			<?php if($product->soldout() == 'false'): ?>
			<form method="post" action="<?php echo url('cart') ?>">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="id" value="<?php echo $product->uid() ?>">
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