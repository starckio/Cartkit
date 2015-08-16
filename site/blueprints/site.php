<?php if(!defined('KIRBY')) exit ?>

title: Site
pages: default
fields:
  siteSettings:
    label: Site Settings
    type: headline
  title:
    label: Title
    type:  text
  author:
    label: Author
    type:  text
  description:
    label: Description
    type:  textarea
  keywords:
    label: Keywords
    type:  tags
  copyright:
    label: Copyright
    type:  textarea

  cartSettings:
    label: Cartkit Settings
    type: headline
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