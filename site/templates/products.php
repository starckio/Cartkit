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
      <h3><a href="<?php echo $product->url() ?>"><?php echo $product->title()->html() ?></a></h3>
      <?php if($image = $product->images()->sortBy('sort', 'asc')->first()): ?>
      <?php echo thumb($image, array('width' => 300, 'height' => 300, 'crop' => true)); ?>
      <?php endif ?>
      <?php if($product->soldout() != ''): ?>
      <h4 class="cf">
        <button class="btn-disabled" type="submit" disabled="">Sold Out</button>
        <?php echo $site->currency_symbol() ?><?php echo $product->price() ?>
      </h4>
      <?php else: ?>
      <form method="post" action="<?php echo url('cart') ?>">
        <input type="hidden" name="action" value="add">
        <input type="hidden" name="id" value="<?php echo $product->uid() ?>">
        <h4 class="cf">
          <button class="btn" type="submit">Add to cart</button>
          <?php echo $site->currency_symbol() ?><?php echo $product->price() ?>
        </h4>
      </form>
      <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>

</main>

<?php snippet('footer') ?>