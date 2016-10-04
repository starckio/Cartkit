<nav role="navigation">
	<ul class="menu cf">
		<?php foreach($pages->visible() as $p): ?>
		<li><a<?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a></li>
		<?php endforeach ?>
		<?php $cart = get_cart(); ?>
		<?php $count = cart_count($cart); ?>
		<li><div class="cart-link"><a<?php e($pages->find('cart')->isOpen(), ' class="active"') ?> href="<?php echo url('cart') ?>" title="Cart"><svg viewBox="0 0 30 30"><path d="M22.7 8c-.9-3.4-4-6-7.7-6S8.2 4.6 7.3 8H2l3 20h20l3-20h-5.3zM15 4c2.6 0 4.8 1.7 5.6 4H9.3c.9-2.3 3.1-4 5.7-4zm8.3 22H6.7L4.3 10H7v3h2v-3h12v3h2v-3h2.7l-2.4 16z"></path></svg>
		<?php if ($count > 0): ?><span class="cart-num"><?php if ($count > 0) echo $count ?></span><?php endif ?></a></div></li>
	</ul>
</nav>