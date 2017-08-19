<?php

// This is a controller file that contains the logic for the blog template.
// It consists of a single function that returns an associative array with
// template variables.
//
// Learn more about controllers at:
// https://getkirby.com/docs/developer-guide/advanced/controllers

return function($site, $pages, $page) {

	// Permet d'afficher le nombre d'article dans le pannier avec le snippet bags.php
	$count = cart_count();

	// Calcule le prix total de la TVA
	$vat = cart_vat($page->price()->value, $site->vat()->value);

	return compact('count', 'vat');
};