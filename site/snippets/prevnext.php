<?php

/*

The $flip parameter can be passed to the snippet to flip
prev/next items visually:

```
<?php snippet('prevnext', ['flip' => true]) ?>
```

Learn more about snippets and parameters at:
https://getkirby.com/docs/templates/snippets

*/

$directionPrev = @$flip ? 'right' : 'left';
$directionNext = @$flip ? 'left'  : 'right';

if($page->hasNextVisible() || $page->hasPrevVisible()): ?>
<nav class="pagination <?= !@$flip ?: ' flip' ?> cf">

	<?php if($page->hasPrevVisible()): ?>
	<a class="<?= $directionPrev ?>" href="<?= $page->prevVisible()->url() ?>" rel="prev" title="<?= $page->prevVisible()->title()->html() ?>">article précédent &rarr;</a>
	<?php else: ?>
	<span class="<?= $directionPrev ?> inactive">article précédent &rarr;</span>
	<?php endif ?>

	<?php if($page->hasNextVisible()): ?>
	<a class="<?= $directionNext ?>" href="<?= $page->nextVisible()->url() ?>" rel="next" title="<?= $page->nextVisible()->title()->html() ?>">&larr; article suivant</a>
	<?php else: ?>
	<span class="<?= $directionNext ?> inactive">&larr; article suivant</span>
	<?php endif ?>

</nav>
<?php endif ?>