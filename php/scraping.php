<?php

require 'simple_html_dom.php';

$html = file_get_html("https://www.superama.com.mx/catalogo/d-despensa/f-cereales");

// foreach($html->find('ul') as $ul) 
// {
//        foreach($ul->find('li') as $li) 
//        {
//             $li->find('a.nombreProductoDisplay', 0)->plaintext .'<br>';
//        }
// }

// $container = $html->find('div.result_col');

foreach($container->find('ul') as $ul) 
{
       foreach($ul->find('li') as $li) 
       {
            $li->find('a.nombreProductoDisplay', 0)->plaintext .'<br>';
       }
}


?>