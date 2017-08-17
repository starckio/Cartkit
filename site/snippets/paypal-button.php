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
	<input type="hidden" name="amount_<?= $i ?>" value="<?= $product->price() ?>" />
	<input type="hidden" name="quantity_<?= $i ?>" value="<?= $quantity ?>">

	<?php $prodtotal = floatval($product->price()->value)*$quantity ?>
	<?php if($site->tax() == 'true'): ?>
	<?php $tax = cart_vat($prodtotal, $site->vat()->value)?>
	<input type="hidden" name="tax_<?= $i ?>" value="<?php printf('%0.2f', $tax) ?>" />
	<?php endif ?>

	<?php endif; ?>
	<?php endforeach; ?>

	<input type="hidden" name="shipping_<?= $i ?>" value="<?php printf('%0.2f', $postage) ?>" />

	<button class="btn-paypal" type="submit">Commander</button>
</form>