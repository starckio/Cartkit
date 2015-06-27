<?php if(!defined('KIRBY')) exit ?>

title: Cart
pages: false
files: false
deletable: false
fields:
  title:
    label: Title
    type:  text
  email:
    label: PayPal Email
    type:  text
  sandbox:
      label: Paypal Sandbox
      type: switch
      text: Use PayPal Sandbox for testing.