<?php

// This is a controller file that contains the logic for the blog template.
// It consists of a single function that returns an associative array with
// template variables.
//
// Learn more about controllers at:
// https://getkirby.com/docs/developer-guide/advanced/controllers

return function($site, $pages, $page) {

	$perpage  = $page->perpage()->int();
	$products = $page->children()
	                 ->visible()
	                 ->flip()
	                 ->paginate(($perpage >= 1)? $perpage : 5);

	if($tag = param('tag')) {
		$products = $products->filterBy('tags', $tag, ',');
	}

	$tags = $products->pluck('tags', ',', false);

	$products   = $products->paginate(10);
	$pagination = $products->pagination();

	// Permet d'afficher le nombre d'article dans le pannier avec le snippet bags.php
	$count = cart_count();

	return compact('products', 'tags', 'tag', 'pagination', 'count');

};