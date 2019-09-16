<?php

include_once('Wrapper/Wrapper.php');

$wrapper = new Wrapper();
/*
//Get 10 Page of categories:
for ($i = 0; $i <= 10; $i++)
{
    $page = $wrapper->GetCategoryPage($i);

    if($page !== '' && $page != null)
    {
        $categoryArr = $wrapper->ParsePageToItem($page);
        if($categoryArr != null)
        {
            print_r($categoryArr);
        }
    }
}
*/

$cat = 1;
$page = 1;
$page = $wrapper->GetItemByCategories($cat, $page);
print_r($page);




