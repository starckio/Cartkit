<?php if($pagination->hasPages()): ?>
<nav class="pagination cf">

	<?php if($pagination->hasPrevPage()): ?>
	<a class="left" href="<?= $pagination->prevPageURL() ?>" rel="prev" title="newer articles">suivant &rarr;</a>
	<?php else: ?>
	<span class="left inactive">suivant &rarr;</span>
	<?php endif ?>

	<?php if($pagination->hasNextPage()): ?>
	<a class="right" href="<?= $pagination->nextPageURL() ?>" rel="next" title="older articles">&larr; précédent</a>
	<?php else: ?>
	<span class="right inactive">&larr; précédent</span>
	<?php endif ?>

</nav>
<?php endif ?>