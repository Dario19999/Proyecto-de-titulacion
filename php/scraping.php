<?php

require 'simple_html_dom.php';

$html = file_get_html ("https://www.sams.com.mx/alimentos-y-bebidas/frutas-y-verduras/cat30315");


$wrap_content = $html->find ('div#productMainContaienr.products-container',0);


$list_ingredients = array();

foreach ($wrap_content as $element){
   // $ingredient = new stdClass();
    echo $element->find('.item-name',0)->plaintext . '<br />';
}

?>