<?php

include_once('Wrapper/Wrapper.php');

$wrapper = new Wrapper();

/*
//Get Single Category By ID
$json = $wrapper->GetSingleCategoryById(1);
echo $json;
$category = $wrapper->ParseSingleCategory($json);
print_r($category);
*/

/*
//Get 10 Page of categories:
for ($i = 0; $i <= 10; $i++)
{
    $page = $wrapper->GetCategoryPage($i);

    //echo $page;

    if($page !== '' && $page != null)
    {
        $categoryArr = $wrapper->ParsePageToCategoryItem($page);
        if($categoryArr != null)
        {
            print_r($categoryArr);
        }
    }
}

$cat = 1;
$page = 1;
$page = $wrapper->GetItemByCategories($cat, $page);
//print_r($page);

if($page !== '' && $page != null)
{
    $wrapper->ParsePageToGoodsItem($page);
}
*/




