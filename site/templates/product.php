<?php snippet('header') ?>

<main class="main" role="main">

	<?php snippet('bags') ?>

	<h1><?php echo $page->title()->html() ?></h1>

	<ul class="meta cf">
		<li><b>Prix:</b> <?php echo $site->currency_symbol() ?><?php echo $page->price() ?></li>
		<?php if($page->soldout() != 'true'): ?>
		<li>
		<form method="post" action="<?php echo url('cart') ?>">
			<input type="hidden" name="action" value="add">
			<input type="hidden" name="id" value="<?php echo $page->uid() ?>">
			<button class="btn" type="submit">Ajouter au panier</button></p>
		</form>
		</li>
		<?php else: ?>
		<li><button class="btn-disabled" type="submit" disabled="">Indisponible</button></p></li>
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
		<a class="prev" href="<?php echo $prev->url() ?>">&larr; précédent</a>
		<?php endif ?>
		<?php if($next = $page->nextVisible()): ?>
		<a class="next" href="<?php echo $next->url() ?>">suivant &rarr;</a>
		<?php endif ?>
	</nav>

</main>

<?php snippet('footer') ?>