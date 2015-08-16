<?php snippet('header') ?>

  <main class="main" role="main">

    <?php snippet('bags') ?>

    <h1><?php echo $page->title()->html() ?></h1>

    <ul class="meta cf">
      <li><b>Price:</b> <?php echo $site->currency_symbol() ?><?php echo $page->price() ?></li>
      <?php if($page->soldout() != ''): ?>
      <li><button class="btn-disabled" type="submit" disabled="">Sold Out</button></p></li>
      <?php else: ?>
      <li>
      <form method="post" action="<?php echo url('cart') ?>">
        <input type="hidden" name="action" value="add">
        <input type="hidden" name="id" value="<?php echo $page->uid() ?>">
        <button class="btn" type="submit">Add to Cart</button></p>
      </form>
      </li>
      <?php endif ?>
    </ul>

    <div class="text">
      <?php echo $page->text()->kirbytext() ?>

      <?php foreach($page->images()->sortBy('sort', 'asc') as $image): ?>
      <figure>
        <img src="<?php echo $image->url() ?>" alt="<?php echo $page->title()->html() ?>">
      </figure>
      <?php endforeach ?>
    </div>

    <nav class="nextprev cf" role="navigation">
      <?php if($prev = $page->prevVisible()): ?>
      <a class="prev" href="<?php echo $prev->url() ?>">&larr; previous</a>
      <?php endif ?>
      <?php if($next = $page->nextVisible()): ?>
      <a class="next" href="<?php echo $next->url() ?>">next &rarr;</a>
      <?php endif ?>
    </nav>

  </main>

<?php snippet('footer') ?>