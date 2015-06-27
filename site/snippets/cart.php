<?php $cart = get_cart(); ?>
<?php $count = cart_count($cart); ?>

<?php if ($count > 0): ?>
<div class="bags">
  <p>You have <strong><?php echo $count ?> item<?php if ($count > 1) echo 's' ?></strong> in your cart. <a class="btn" href="<?php echo url('products/cart') ?>">View your Cart and Pay</a></p>
</div>
<?php endif ?>