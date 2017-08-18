<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
	<meta name="description" content="<?= $site->description()->html() ?>">
	<meta name="keywords" content="<?= $site->keywords()->html() ?>">
	<?= css(array(
		'assets/css/main.css',
		'@auto',
		'assets/css/featherlight.css',
		'assets/css/featherlight.gallery.css'
	)) ?>
	<style>
		/* Code de devise à gauche du prix */
		/*.devise:before {content:"<?= $site->currency_symbol() ?>";font-size:smaller;margin-right:.1em}*/

		/* Code de devise à droite du prix */
		.devise:after {content:"<?= $site->currency_symbol() ?>";font-size:smaller;margin-left:.1em}
	</style>
	<?= js(array(
		'assets/js/jquery.min.js',
		'assets/js/featherlight.js',
		'assets/js/featherlight.gallery.js',
		'assets/js/script.js'
	)) ?>
</head>
<body>

<header class="header cf" role="banner">
	<a class="logo" href="<?= url() ?>">
		<img src="<?= url('assets/images/logo.svg') ?>" alt="<?= $site->title()->html() ?>" />
	</a>
	<?php snippet('menu') ?>
</header>