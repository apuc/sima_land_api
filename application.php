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
*/

/*
//Get page of items by category ID
$cat = 1;
$page = 1;
$page = $wrapper->GetItemsByCategories($cat, $page);
print_r($page);

if($page !== '' && $page != null)
{
    $goodsArr = $wrapper->ParsePageToGoodsItems($page);
    if($goodsArr != null)
    {
        print_r($goodsArr);
    }
}*/

/*
//Get Single Goods By ID
$json = $wrapper->GetSingleGoodsById(955033);
echo $json;
$good = $wrapper->ParseSingleGoods($json);
print_r($good);
*/

/*//Get Single Author By ID
$json = $wrapper->GetSingleAuthor(116);
echo $json."\n";
$author = $wrapper->ParseSingleAuthor($json);
print_r($author);*/

//Get page of Author
$page = $wrapper->GetCategoryPage(1);
echo $page;
if($page !== '' && $page != null)
{
    $authorArr = $wrapper->ParsePageToAuthorItems($page);
    if($authorArr != null)
    {
        print_r($authorArr);
    }
}
