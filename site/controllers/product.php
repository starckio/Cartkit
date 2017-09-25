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

	// Calcul de la valeur de la taxe incluse dans le prix TTC donné
	$tax_incl = cart_vat_incl($page->price()->value, $site->vat()->value);

	return compact('count', 'tax_incl');
};