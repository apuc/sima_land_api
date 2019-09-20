<?php
require 'vendor/autoload.php';

use Classes\Wrapper\IUrls;
use Classes\Wrapper\Wrapper;

try {
    $data = array(
        'path' => '2',
        'level' => '2');

    foreach (Wrapper::runFor(IUrls::Category)
        ->query($data)->getItemFromJson() as $item)
            echo $item->name . "\n";



} catch (Exception $e) {
    print_r($e);
}
