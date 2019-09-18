<?php

foreach (glob('Wrapper/Classes/*.php') as $filename)
{
    include_once $filename;
}
/*
$category = new CategoryWrapper();
$data = array(
    'path'=>'2',
    'level'=>'2');

try
{
    $json = $category->Query($data);
    print_r($category->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}*/
/*
$goods = new GoodsWrapper();

try
{
    $json = $goods->GetById(100);
    echo $json;
    $goods->ParseJson($json);
}
catch (Exception $e)
{
    echo$e;
}
*/
/*$currency = new CurrencyWrapper();

try
{
    $json = $currency->GetById(2);
    echo $json;
    print_r($currency->ParseJson($json)) ;
}
catch (Exception $e)
{
    echo$e;
}*/
/*$author = new AuthorWrapper();

try
{
    $json = $author->GetById(116);
    //echo $json;
    print_r($author->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}*/
/*$series = new SeriesWrapper();

try
{
    $json = $series->GetPage(100);
    echo $json;
    print_r($series->ParseJson($json)) ;
}
catch (Exception $e)
{
    echo $e;
}*/
/*$district = new DistrictWrapper();

try
{
    $json = $district->GetPage(1);
    echo $json;
    print_r($district->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}*/

/*$settlement= new SettlementWrapper();

try
{
    $json = $settlement->GetPage(1);
    echo $json;
    print_r($settlement->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}*/

/*$item = new ItemCommentWrapper();

try
{
    $json = $item->GetPage(1);
    echo $json;
    print_r($item->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}*/

/*$offer = new OfferWrapper();
try
{
    $json = $offer->GetPage(1);
    echo $json;
    print_r($offer->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}*/

/*$delivery_address = new OfferWrapper();
try
{
    $json = $delivery_address->GetPage(1);
    echo $json;
    print_r($delivery_address->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}*/

/*$material = new MaterialWrapper();
try
{
    $json = $material->GetPage(1);
    echo $json;
    print_r($material->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}*/

/*$gift = new GiftWrapper();
try
{
    $json = $gift->GetPage(1);
    echo $json;
    print_r($gift->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}*/
/*
$country = new CountryWrapper();
try
{
    $json = $country->GetPage(1);
    echo $json;
    print_r($country->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}*/
$trademark = new TrademarkWrapper();
try
{
    $json = $trademark->GetPage(1);
    echo $json;
    print_r($trademark->ParseJson($json));
}
catch (Exception $e)
{
    echo $e;
}
