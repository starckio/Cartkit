<?php

// This is a controller file that contains the logic for the blog template.
// It consists of a single function that returns an associative array with
// template variables.
//
// Learn more about controllers at:
// https://getkirby.com/docs/developer-guide/advanced/controllers

return function($site, $pages, $page) {

	// Defini les actions ajouter/augmenter, diminuer, mettre a jour & supprimer un article
	$cart = cart_logic();

	// Calcule le nombre total d'articles present dans le panier
	$count = cart_count();

	// Calcule le prix total des articles
	$total = cart_calc_total();
	$products = $pages->find('products')->children()->visible();

	// Calcule le prix total de la TVA
	$vat = cart_vat($total, $site->vat()->value);

	// Frais de livraison
	$postage = cart_postage($total);

	return compact('cart', 'count', 'total', 'products', 'vat', 'postage');
};