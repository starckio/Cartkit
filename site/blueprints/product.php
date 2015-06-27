<?php if(!defined('KIRBY')) exit ?>

title: Product
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type:  text
    width: 3/4
  price:
    label: price
    type:  text
    width: 1/4
  soldout:
    label: Sold Out
    type: switch
    text: The product is out of stock.
  text:
    label: Text
    type:  textarea