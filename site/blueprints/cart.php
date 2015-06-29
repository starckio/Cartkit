<?php if(!defined('KIRBY')) exit ?>

title: Cart
pages:
  hide: true
files: false
deletable: false
fields:
  title:
    label: Title
    type:  text
    width: 1/2
  email:
    label: PayPal Email
    type:  text
    icon: paypal
    required: true
    width: 1/2
  currency_code:
    label: Currency Code
    type:  text
    placeholder: EUR, USD, GBP…
    icon: money
    required: true
    width: 1/4
  currency_symbol:
    label: Currency Symbol
    type:  text
    placeholder: €, $, £…
    icon: money
    required: true
    width: 1/4
  sandbox:
      label: Paypal Sandbox
      type: switch
      text: Use PayPal Sandbox for testing.
      width: 1/2