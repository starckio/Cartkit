<?php $cart = cart_logic(get_cart()) ?>
<?php $products = $pages->find('products')->children()->visible() ?>
<?php snippet('header') ?>

<?php if(count($cart) == 0): ?>

<main id="cart" class="main black" role="main">
	<div class="text">
		<h1>Votre panier est vide.</h1>
		<a class="btn-white" href="<?php echo url('products') ?>">Voir les articles</a>
	</div>
</main>

<?php else: ?>

<main id="cart" class="main" role="main">
	<div class="text">
		<h1><?php echo $page->title()->html() ?></h1>
		<?php if($site->sandbox() == 'true'): ?>
		<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
		<?php else: ?>
		<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
		<?php endif ?>
			<input type="hidden" name="cmd" value="_cart">
			<input type="hidden" name="upload" value="1">
			<input type="hidden" name="business" value="<?php echo $site->email() ?>">
			<input type="hidden" name="currency_code" value="<?php echo $site->currency_code() ?>">
			<input type="hidden" name="cbt" value="Return to <?php echo $site->title() ?>">
			<input type="hidden" name="cancel_return" value="<?php echo url('cart') ?>">
			<input type="hidden" name="return" value="<?php echo url('cart/paid') ?>">
			<table cellpadding="6" rules="GROUPS" frame="BOX">
				<thead>
					<tr>
					<th>Produit</th>
					<th>Quantité</th>
					<th></th>
					<th style="text-align: right;">Prix</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=0; $count = 0; $total = 0; ?>
				<?php foreach($cart as $id => $quantity): ?>
				<?php if($product = $products->findByURI($id)): ?>
				<?php $i++; ?>
				<?php $count += $quantity ?>
					<tr>
						<td>
							<input type="hidden" name="item_name_<?php echo $i ?>" value="<?php echo $product->title() ?>" />
							<input type="hidden" name="amount_<?php echo $i ?>" value="<?php echo $product->price() ?>" />
							<a href="<?php echo $product->url() ?>">
							<?php echo kirbytext($product->title(), false) ?>
							</a>
						</td>
						<td>
							<input data-id="<?php echo $product->uid() ?>" data-quantity="<?php echo $quantity ?>" pattern="[0-9]*" class="quantity" type="hidden" name="quantity_<?php echo $i ?>" min="1" value="<?php echo $quantity ?>">
							<?php echo $quantity ?> x
							<a class="btn add" href="<?php echo url('cart') ?>?action=add&amp;id=<?php echo $product->uid() ?>">+</a>
							<?php if ($quantity > 1): ?>
							<a class="btn remove" href="<?php echo url('cart') ?>?action=remove&amp;id=<?php echo $product->uid() ?>">-</a>
							<?php endif ?>
						</td>
						<td><a class="btn-red delete" href="<?php echo url('cart') ?>?action=delete&amp;id=<?php echo $product->uid() ?>">Retirer</a></td>
						<?php $prodtotal = floatval($product->price()->value)*$quantity ?>
						<?php if($site->tax() == 'true'): ?>
						<?php $tax = cart_vat($prodtotal, (string)$site->vat())?>
						<td style="text-align: right;"><?php echo $site->currency_symbol() ?><?php printf('%0.2f', $prodtotal+$tax) ?></td>
						<?php else: ?>
						<td style="text-align: right;"><?php echo $site->currency_symbol() ?><?php printf('%0.2f', $prodtotal) ?></td>
						<?php endif ?>
					</tr>
				<?php $total += $prodtotal ?>
				<?php endif; ?>
				<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td align="left" colspan="3">Sous-total</td>
						<?php if($site->tax() == 'true'): ?>
						<?php $tax = cart_vat($total, (string)$site->vat())?>
						<td style="text-align: right;"><?php echo $site->currency_symbol() ?><?php printf('%0.2f', $total+$tax) ?></td>
						<?php else: ?>
						<td style="text-align: right;"><?php echo $site->currency_symbol() ?><?php printf('%0.2f', $total) ?></td>
						<?php endif ?>
					</tr>
					<?php if($site->tax() == 'true'): ?>
					<tr>
					<?php $tax = cart_vat($total, (string)$site->vat())?>
						<td align="left" colspan="3">TVA ajouté de</td>
						<td style="text-align: right;"><?php echo $site->currency_symbol() ?><?php printf('%0.2f', $tax) ?></td>
						<input type="hidden" name="tax_<?php echo $i ?>" value="<?php printf('%0.2f', $tax) ?>" />
					</tr>
					<?php endif ?>
					<tr>
					<?php $postage = cart_postage($total) ?>
						<td align="left" colspan="3">Frais de port</td>
						<td style="text-align: right;"><?php echo $site->currency_symbol() ?><?php printf('%0.2f', $postage) ?></td>
						<input type="hidden" name="shipping_<?php echo $i ?>" value="<?php printf('%0.2f', $postage) ?>" />
					</tr>
					<tr>
						<th align="left" colspan="3">Montant total</th>
						<?php if($site->tax() == 'true'): ?>
						<th style="text-align: right;"><?php echo $site->currency_symbol() ?><?php printf('%0.2f', $total+$tax+$postage) ?></th>
						<?php else: ?>
						<th style="text-align: right;"><?php echo $site->currency_symbol() ?><?php printf('%0.2f', $total+$postage) ?></th>
						<?php endif ?>
					</tr>
				</tfoot>
			</table>
			<div><button class="btn-paypal" type="submit">Payer avec PayPal</button> ou <a class="btn" href="<?php echo url('products') ?>">Continuer les achats</a></div>
		</form>
	</div>
</main>

<?php endif; ?>

<?php snippet('footer') ?>