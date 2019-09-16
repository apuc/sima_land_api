<?php

include_once('Wrapper/Wrapper.php');

$wrapper = new Wrapper();

for ($i = 1; $i <= 10; $i++)
{
    $page = $wrapper->GetCategoryPage($i);

    if($page !== '')
    {
        $categoryArr = $wrapper->ParsePageToItem($page);
        if($categoryArr != null)
        {
            print_r($categoryArr);
        }
    }
}





