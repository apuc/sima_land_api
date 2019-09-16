<?php

require_once ('vendor/autoload.php');
include_once('Objects/SimaLandResponse.php');

$curl = curl_init('https://www.sima-land.ru/api/v3/category/');
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($curl); // сохранен json
curl_close($curl);
//echo $json;

$serializer = JMS\Serializer\SerializerBuilder::create()->build();
$object = $serializer->deserialize($json, 'SimaLandResponse', 'json');

print_r($object);


