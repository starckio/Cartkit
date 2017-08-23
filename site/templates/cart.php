<?php snippet('header') ?>

<?php if($count > 0): ?>

<main id="cart" class="main cf" role="main">

	<?php snippet('paypal-sandbox') ?>

	<h1><?= $page->subtitle()->or($page->title()) ?></h1>

	<ul class="cart-items">
		<?php foreach($cart as $id => $quantity): ?>
		<?php if($product = $products->findByURI($id)): ?>
		<li class="cart-item">
			<div class="item-image-details cf">
				<?php $image = $product->cover_image()->toFile();
					if($image):
				?>
				<a class="item-image" href="<?= $product->url() ?>" style="background-image:url('<?= thumb($image, array('width' => 200, 'height' => 200, 'crop' => true))->url(); ?>');"></a>
				<?php endif ?>
				<div class="item-details">
					<a class="item-product-link" href="<?= $product->url() ?>">
						<h3 class="item-details-name"><?= h($product->title(), false) ?></h3>
						<?php $prodtotal = floatval($product->price()->value) * $quantity ?>
						<span class="item-details-price devise"><?php printf('%0.2f', $prodtotal) ?></span>
					</a>
				</div>
			</div>
			<div class="item-quantity-holder cf">
				<?php if($quantity > 1): ?>
				<form method="post" action="<?= url('cart') ?>">
					<input type="hidden" name="action" value="remove">
					<input type="hidden" name="id" value="<?= $product->uid() ?>">
					<button class="btn remove" type="submit"><svg viewBox="0 0 20 20"><path d="M5 9h10v2H5z"></path><path d="M5 9h10v2H5z"></path></svg></button>
				</form>
				<?php else: ?>
				<form method="post" action="<?= url('cart') ?>">
					<input type="hidden" name="action" value="delete">
					<input type="hidden" name="id" value="<?= $product->uid() ?>">
					<button class="btn-red remove" type="submit"><svg viewBox="0 0 20 20"><path d="M11 5H9v4H5v2h4v4h2v-4h4V9h-4z"></path></g></svg></button>
				</form>
				<?php endif ?>

				<form method="post" action="<?= url('cart') ?>">
					<input type="hidden" name="action" value="update">
					<input type="hidden" name="id" value="<?= $product->uid() ?>">
					<input type="text" name="quantity" value="<?= $quantity ?>" class="quantity" autocomplete="off">
				</form>

				<form method="post" action="<?= url('cart') ?>">
					<input type="hidden" name="action" value="add">
					<input type="hidden" name="id" value="<?= $product->uid() ?>">
					<button class="btn add" type="submit"><svg viewBox="0 0 20 20"><path d="M11 5H9v4H5v2h4v4h2v-4h4V9h-4z"></path></svg></button>
				</form>
			</div>
			<?php $prodtotal = floatval($product->price()->value) * $quantity ?>
			<h3 class="price devise"><?php printf('%0.2f', $prodtotal) ?></h3>
		</li>
		<?php endif ?>
		<?php endforeach ?>
	</ul>


	<div class="cart-footer cf">
		<div class="cart-totals">
			<?php if($site->tax() == 'true'): ?>
			<h4 class="tva">TVA incluse<span class="devise"><?php printf('%0.2f', $vat) ?></span></h4>
			<?php endif ?>

			<?php $postage = cart_postage($total) ?>
			<h4 class="postage">Frais de port <span class="devise"><?php printf('%0.2f', $postage) ?></span></h4>

			<h3 class="total">Total <span class="devise"><?php printf('%0.2f', $total+$postage) ?></span></h3>

			<?php snippet('paypal-button') ?>
			<a class="continue-shopping" href="<?= url('products') ?>">Continuer les achats</a>
		</div>
	</div>

</main>

<?php else: ?>

<main id="cart" class="main black" role="main">
	<div class="text">
		<h1>Votre panier est vide.</h1>
		<a class="btn-white" href="<?= url('products') ?>">Voir les articles</a>
	</div>
</main>

<?php endif ?>

<?php snippet('footer') ?>
