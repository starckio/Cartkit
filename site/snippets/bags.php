<?php $cart = get_cart(); ?>
<?php $count = cart_count($cart); ?>

<?php if ($count > 0): ?>
<div class="bags cf">
	<p>Vous avez <strong><?php echo $count ?> article<?php if ($count > 1) echo 's' ?></strong> dans votre panier.</p>
	<a class="btn-white" href="<?php echo url('cart') ?>">Voir votre panier</a>
</div>
<?php endif ?>