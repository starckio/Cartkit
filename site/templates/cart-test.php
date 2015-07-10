<?php $cart = cart_logic(get_cart()) ?>
<?php $products = $page->siblings()->visible() ?>
<?php snippet('header') ?>

<main class="main" role="main">
  <div class="text">
    <h1><?php echo $page->title()->html() ?></h1>
 
    <?php foreach($cart as $product): ?>
    <div class="panier">
      <p class="title"><?php echo $product->title()->kirbytext() ?></p>
      <p class="quantity"><?php echo $product->quantity() ?></p>
      <p class="prix"><?php echo $product->prodtotal() ?></p>
      <a class="btn add" href="<?php echo $product->add() ?>">+</a>
      <a class="btn remove" href="<?php echo $product->remove() ?>">-</a>
      <a class="btn-red delete" href="<?php echo $product->delete() ?>">Delete</a></td>
    </div>
    <?php endforeach; ?>

    <div class="total">
      <p>Subtotal: <?php echo $page->currency_symbol() ?> <?php echo $page->total() ?></p>
      <p>Postage: <?php echo $page->currency_symbol() ?> <?php echo $page->postage() ?></p>
      <p>Total: <?php echo $page->currency_symbol() ?> <?php echo $page->totalpostage() ?></p>
    </div>

    <!-- Formulaire PayPal -->
    <?php if($page->sandbox() != ''): ?>
    <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
    <?php else: ?>
    <form method="post" action="https://www.paypal.com/cgi-bin/webscr">
    <?php endif ?>
      <input type="hidden" name="cmd" value="_cart">
      <input type="hidden" name="upload" value="1">
      <input type="hidden" name="business" value="<?php echo $page->email() ?>">
      <input type="hidden" name="currency_code" value="<?php echo $page->currency_code() ?>">
      <input type="hidden" name="return" value="<?php echo url('products/complete') ?>">
      <input type="hidden" name="cbt" value="Return to KirbyCart">
      <input type="hidden" name="cancel_return" value="<?php echo url('products/cart') ?>">
      <input type="hidden" name="item_name_<?php echo $i ?>" value="<?php echo $page->itemtitle() ?>" />
      <input type="hidden" name="amount_<?php echo $i ?>" value="<?php echo $page->price() ?>" />
      <input type="hidden" name="quantity_<?php echo $i ?>" min="1" value="<?php echo $page->quantity() ?>">
      <input type="hidden" name="shipping_<?php echo $i ?>" value="<?php echo $page->totalpostage() ?>" />
      <p>
        <button class="btn-paypal" type="submit">Pay with PayPal</button>
        or
        <a class="btn" href="<?php echo url('products') ?>">continue shopping</a>
      </p>
    </form>
    <!-- Fin Formulaire PayPal -->
  </div>
</main>

<?php snippet('footer') ?>