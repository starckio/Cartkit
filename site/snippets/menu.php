<nav role="navigation">
  <ul class="menu cf">
    <?php foreach($pages->visible() as $p): ?>
    <li><a<?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a></li>
    <?php endforeach ?>
    <?php $cart = get_cart(); ?>
    <?php $count = cart_count($cart); ?>
    <li><a<?php e($pages->find('cart')->isOpen(), ' class="active"') ?> href="<?php echo url('cart') ?>">Cart <?php if ($count > 0): ?><span><?php if ($count > 0) echo $count ?></span><?php endif ?></a></li>
  </ul>
</nav>