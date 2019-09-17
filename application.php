<?php

include_once('Wrapper/Wrapper.php');

$wrapper = new Wrapper();


/*//Get Single Category By ID
$json = $wrapper->GetSingleCategoryById(1);
echo $json;
$category = $wrapper->ParseSingleCategory($json);
print_r($category);*/


/*
//Get 10 Page of categories:
for ($i = 0; $i <= 10; $i++)
{
    $page = $wrapper->GetCategoryPage($i);

    if($page !== '' && $page != null)
    {
        $categoryArr = $wrapper->ParsePageToCategoryItems($page);
        if($categoryArr != null)
        {
            print_r($categoryArr);
        }
    }
}*/


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
/*
//Get Single Author By ID
$json = $wrapper->GetSingleAuthorById(116);
echo $json."\n";
$author = $wrapper->ParseSingleAuthor($json);
print_r($author);*/

/*
//Get page of Authors
$page = $wrapper->GetCategoryPage(1);
echo $page;
if($page !== '' && $page != null)
{
    $authorArr = $wrapper->ParsePageToAuthorItems($page);
    if($authorArr != null)
    {
        print_r($authorArr);
    }
}*/

/*
//Get Single Currency By ID
$json = $wrapper->GetSingleCurrencyById(1);
echo $json;
$currency = $wrapper->ParseSingleCurrency($json);
print_r($currency);*/

/*//Get page of Currency
$json = $wrapper->GetCurrencyPage();
echo $json;
if($json !== '' && $json != null)
{
    $currencyArr = $wrapper->ParsePageToCurrencyItems($json);
    if($currencyArr != null)
    {
        print_r($currencyArr);
    }
}*/

//echo $wrapper->GetSeriesPage(1);
/*$json = $wrapper->GetSeriesPage(1);
print_r($wrapper->ParsePageToSeriesItems($json));*/

//echo $wrapper->GetDistrictsPage(1);
/*$json = $wrapper->GetDistrictsPage(1);
echo $json;
$districts = $wrapper->ParsePageToDistrictsItems($json);
print_r($districts);*/

//echo $wrapper->GetSettlementsPage(1);
/*$json = $wrapper->GetSettlementsPage(2);
echo $json;
$settlement = $wrapper->ParsePageToSettlementsItems($json);
print_r($settlement);*/

/*$json = $wrapper->GetGiftsPage(1);
echo $json;
$gifts = $wrapper->ParsePageToGiftsItems($json);
print_r($gifts);*/

/*$json = $wrapper->GetItemCommentsPage(1);
echo $json;
$comments = $wrapper->ParsePageToItemCommentsItems($json);
print_r($comments);*/

/*$json = $wrapper->GetOffersPage(1);
echo $json;
$offers =  $wrapper->ParsePageToOfferItems($json);
print_r($offers);*/
/*
$json = $wrapper->GetDeliveryAddressPage(1);
echo $json;
$delivery =  $wrapper->ParsePageToDeliveryAddressItems($json);
print_r($delivery);*/

/*$json = $wrapper->GetMaterialPage(1);
echo $json;
$material = $wrapper->ParsePageToMaterialItems($json);
print_r($material);*/
/*
$json = $wrapper->GetCountryPage(1);
echo $json;
$country =  $wrapper->ParsePageToCountryItems($json);
print_r($country);*/

/*$json = $wrapper->GetMostLikedPage(1);
echo $json;
$most_liked =  $wrapper->ParsePageToMostLikedItems($json);
print_r($most_liked);*/

/*$json = $wrapper->GetNewsPage(1);
echo $json;
$news =  $wrapper->ParsePageToNewsItems($json);
print_r($news);*/

$json = $wrapper->GetCarModelPage(1);
echo $json;
$car =  $wrapper->ParsePageToCarModelItems($json);
print_r($car);
