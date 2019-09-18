<?php

foreach (glob('Wrapper/Classes/*.php') as $filename)
{
    include_once $filename;
}
/*
$data = array(
    'path'=>'2',
    'level'=>'2');

try {
    print_r(Category::run()
        ->getPage(1)
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}
*/
try {
    print_r(Goods::run()
        ->getAllMostLiked()
        ->jsonToObj());
}
catch (Exception $e)
{
    echo $e;
}



