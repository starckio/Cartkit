<h2><?php echo l::get('latest-products') ?></h2>

<ul class="teaser cf">
  <?php foreach(page('products')->children()->visible()->limit(3) as $product): ?>
  <li>
    <h3><a href="<?php echo $product->url() ?>"><?php echo $product->title()->html() ?></a></h3>
    <?php if($image = $product->images()->sortBy('sort', 'asc')->first()): ?>
    <a href="<?php echo $product->url() ?>">
      <img src="<?php echo $image->url() ?>" alt="<?php echo $product->title()->html() ?>" >
    </a>
    <?php endif ?>
    <p>
      <form method="post" action="<?php echo url('products/cart') ?>">
        <input type="hidden" name="action" value="add">
        <input type="hidden" name="id" value="<?php echo $product->uid() ?>">
        £<?php echo $product->price() ?> — <button class="btn" type="submit">Add to Cart</button>
      </form>
    </p>
  </li>
  <?php endforeach ?>
</ul>