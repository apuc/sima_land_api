<?php
require 'vendor/autoload.php';
use Classes\Wrapper\Category;

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

/*try {
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
*/
