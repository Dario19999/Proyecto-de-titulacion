<?php

require 'simple_html_dom.php';

echo $html = file_get_html("https://www.chedraui.com.mx/Departamentos/S%C3%BAper/c/MC21?siteName=Sitio+de+Chedraui&isAlcoholRestricted=false");

// foreach($html->find('ul') as $ul) 
// {
//        foreach($ul->find('li') as $li) 
//        {
//             $li->find('a.nombreProductoDisplay', 0)->plaintext .'<br>';
//        }
// }

// $container = $html->find('ul.items');

// foreach($container->find('ul') as $ul) 
// {
//        foreach($ul->find('li') as $li) 
//        {
//             $li->find('a.nombreProductoDisplay', 0)->plaintext .'<br>';
//        }
// }

$ret = $html->find('a')->plaintext;


?>