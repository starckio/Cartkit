<?php

// This is a controller file that contains the logic for the blog template.
// It consists of a single function that returns an associative array with
// template variables.
//
// Learn more about controllers at:
// https://getkirby.com/docs/developer-guide/advanced/controllers

return function($site, $pages, $page) {

	// Active les fonctions $cart et $count
	// Pour utiliser le snippet bags.php aux templates qui n'ont pas de controller
	$cart = cart_logic();
	$count = cart_count();

	return compact('cart', 'count');
};