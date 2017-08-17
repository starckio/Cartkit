<?php if($count > 0): ?>
<div class="bags cf">
	<h4>Vous avez <strong><?= $count ?> article<?php if($count > 1) echo 's' ?></strong> dans votre panier.</h4>
	<a class="btn-white" href="<?= url('cart') ?>">Voir votre panier</a>
</div>
<?php endif ?>