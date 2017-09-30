<?php if($site->sandbox() == 'true'): ?>
<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
<?php else: ?>
<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
<?php endif ?>
	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
	<input type="hidden" name="business" value="<?= $site->email() ?>">
	<input type="hidden" name="currency_code" value="<?= $site->currency_code() ?>">
	<input type="hidden" name="cbt" value="Return to <?= $site->title() ?>">
	<input type="hidden" name="cancel_return" value="<?= url('cart') ?>">
	<input type="hidden" name="return" value="<?= url('cart/paid') ?>">

	<?php $i = 0; foreach($cart as $id => $quantity): $i++; ?>

		<?php if($product = $products->findByURI($id)): ?>
			<input type="hidden" name="item_name_<?= $i ?>" value="<?= $product->title() ?>" />
			<?php if($site->tax() == 'true'): ?>
			<?php $price_ht = cart_ht($product->price()->value, $site->vat()->value); ?>
			<input type="hidden" name="amount_<?= $i ?>" value="<?php printf('%0.2f', $price_ht) ?>" />
		<?php else: ?>
			<input type="hidden" name="amount_<?= $i ?>" value="<?= $product->price() ?>" />
		<?php endif ?>

		<input type="hidden" name="quantity_<?= $i ?>" value="<?= $quantity ?>">

		<?php if($site->tax() == 'true'): ?>
			<?php $prod_price = floatval($product->price()->value) ?>
			<?php $tax = cart_vat_incl($prod_price, $site->vat()->value)?>
			<input type="hidden" name="tax_<?= $i ?>" value="<?php printf('%0.2f', $tax) ?>" />
			<?php endif ?>
		<?php endif ?>

	<?php endforeach ?>
	<input type="hidden" name="shipping_<?= $i ?>" value="<?php echo str_replace(',', '.', sprintf('%0.2f', $postage)) ?>" />
	<button class="btn-checkout-paypal" type="submit">Payer avec PayPal</button>
</form>