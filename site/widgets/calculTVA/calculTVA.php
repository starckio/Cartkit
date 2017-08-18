<?php
if (c::get('calculTVA')) {
return array(
  'title'   => 'Calcul de la TVA',
  'options' => array(),
  'html'    => function() {

    return tpl::load(__DIR__ . DS . 'template.php');
    
  }
);
}
return false;