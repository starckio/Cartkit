<?php
// Demarre la session
function get_cart() {
	s::start();
	$cart = s::get('panier', array());

	return $cart;
}

// Defini les actions ajouter/augmenter, diminuer, mettre a jour & supprimer un article
function cart_logic() {
	$cart = s::get('panier', array());

	if(isset($_REQUEST['action'])) {
		$action = $_REQUEST['action'];
		$id = $_REQUEST['id'];

		switch ($action) {
			// Ajoute un article / Augmente la quantite d'un article
			case 'add':
				if(isset($cart[$id])) {
					$cart[$id]++;
				} else {
					$cart[$id] = 1;
				}
			break;
			// Diminue la quantite d'un article
			case 'remove':
				if(isset($cart[$id])) {
					$cart[$id]--;
				} else {
					$cart[$id] = 1;
				}
			break;
			// Met a jour la quantite d'un article
			case 'update':
				if(isset($_REQUEST['quantity'])) {
					$quantity = intval($_REQUEST['quantity']);
					if ($quantity < 1) {
						unset($cart[$id]);
					} else {
						$cart[$id] = $quantity;                
					}
				}
			break;
			// Supprime un article
			case 'delete':
				if (isset($cart[$id])) {
					unset($cart[$id]);
				}
			break;
		}
		s::set('panier', $cart);
	}
	
	return $cart;
}

// Calcule le nombre total d'articles present dans le panier
function cart_count() {
	$cart = s::get('panier', array());

	$count = 0;
	foreach ($cart as $id => $quantity) {
		$count += $quantity;
	}

	return $count;
}

// Calcule le prix total des articles sans les frais de livraison
function cart_calc_total() {
	$site  = site();
	$pages = $site->pages();
	$products = $pages->find('products')->children()->visible();
	$cart = s::get('panier', array());

	$count = 0; $total = 0;
	foreach($cart as $id => $quantity){
		if($product = $products->findByURI($id)){
			$count += $quantity;
			$prodtotal = floatval($product->price()->value) * $quantity;
			$total += $prodtotal;
		}
	}

	return $total;
}

// Calcul de la valeur HT d'un prix TTC donné
function cart_ht($ttc, $vat) {
	$ht = $ttc / (1 + $vat/100);
	return $ht;
}

// Calcul de la valeur de la taxe incluse dans le prix TTC donné
function cart_vat_incl($ttc, $vat) {
	$ht = $ttc / (1 + $vat/100);
	$tax_incl = $ttc - $ht;
	return $tax_incl;
}

// Calcul de la valeur de la TVA à ajouter à un prix net
function cart_vat($net, $vat) {
	$tax = $net * $vat/100;
	return $tax;
}

// Frais de livraison
function cart_postage($total) {
	$postage;
	switch ($total) {
		case ($total < 10):
			$postage = 2.5;
			break;
		case ($total < 30):
			$postage = 5.5;
			break;
		case ($total < 75):
			$postage = 8;
			break;
		case ($total < 150):
			$postage = 11.56;
			break;
		case ($total < 300):
			$postage = 28.30;
			break;
		default:
			$postage = 40.75;
	}

	return $postage;
}