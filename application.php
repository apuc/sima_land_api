<?php

include_once('Wrapper/Classes/CategoryWrapper.php');
include_once('Wrapper/Classes/GoodsWrapper.php');
include_once('Wrapper/Classes/CurrencyWrapper.php');

/*
$category = new CategoryWrapper();

$data = array(
    'path'=>'2',
    'level'=>'2');

$json = $category->Query($data);
print_r($category->ParseJson($json));

$json = $category->GetById(1);
echo $json;
print_r($category->ParseJson($json));*/

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

$currency = new CurrencyWrapper();

try
{
    $json = $currency->GetById(2);
    echo $json;
    print_r($currency->ParseJson($json)) ;
}
catch (Exception $e)
{
    echo$e;
}
