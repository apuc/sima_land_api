<?php

include_once('Wrapper/Classes/CategoryWrapper.php');

$category = new CategoryWrapper();

$data = array(
    'path'=>'2',
    'level'=>'2');

$json = $category->Query($data);
print_r($category->ParseJson($json));
/*
$json = $category->GetById(1);
echo $json;
print_r($category->ParseJson($json));*/

