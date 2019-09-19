<?php
require 'vendor/autoload.php';

use Classes\Wrapper\Category;
use Classes\Wrapper\Comment;
use Classes\Wrapper\Currency;
use Classes\Wrapper\Author;
use Classes\Wrapper\DeliveryAddress;
use Classes\Wrapper\District;
use Classes\Wrapper\Gift;
use Classes\Wrapper\Offer;
use Classes\Wrapper\Series;
use Classes\Wrapper\Settlement;
use http\Exception;

/*
$data = array(
    'path'=>'2',
    'level'=>'2');

try {
    print_r(Category::run()
        ->query($data)->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}

try {
    print_r(Goods::run()
        ->getById(10000)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}

try {
    print_r(Currency::run()
        ->getById(1)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}

try {
    print_r(Author::run()
        ->getPage(1)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}

try {
    print_r(Series::run()
        ->getPage(1)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}

try {
    print_r(District::run()
        ->getPage(1)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}

try {
    print_r(Settlement::run()
        ->getPage(1)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}

try {
    print_r(Gift::run()
        ->getPage(1)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}

try {
    print_r(Comment::run()
        ->getPage(1)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}

try {
    print_r(Offer::run()
        ->getById(55)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}
*/
try {
    print_r(DeliveryAddress::run()
        ->getPage(1)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}
