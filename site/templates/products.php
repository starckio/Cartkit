<?php snippet('header') ?>

<?php snippet('cart') ?>

<main class="main" role="main">

  <div class="text">
    <h1><?php echo $page->title()->html() ?></h1>
    <?php echo $page->text()->kirbytext() ?>
  </div>

  <hr>

  <h2><?php echo l::get('latest-products') ?></h2>
  
  <ul class="teaser cf">
    <?php foreach($page->children()->visible()->flip() as $product): ?>
    <li>
      <h3><a href="<?php echo $product->url() ?>"><?php echo $product->title()->html() ?></a></h3>
      <?php if($image = $product->images()->sortBy('sort', 'asc')->first()): ?>
      <a href="<?php echo $product->url() ?>">
        <img src="<?php echo $image->url() ?>" alt="<?php echo $product->title()->html() ?>" >
      </a>
      <?php endif ?>
      <?php if($product->soldout() != ''): ?>
      <p>£<?php echo $product->price() ?> — <button class="btn-disabled" type="submit" disabled=""><?php echo l::get('sold-out') ?></button></p>
      <?php else: ?>
      <form method="post" action="<?php echo url('products/cart') ?>">
        <input type="hidden" name="action" value="add">
        <input type="hidden" name="id" value="<?php echo $product->uid() ?>">
        <p>£<?php echo $product->price() ?> — <button class="btn" type="submit">Add to Cart</button></p>
      </form>
      <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>
</main>

<?php snippet('footer') ?>