<?php
require 'vendor/autoload.php';

use Classes\Wrapper\IUrls;
use Classes\Wrapper\Wrapper;

try {

    $data = array(
        'path' => '2',
        'level' => '2');

    print_r (Wrapper::objectToArray(Wrapper::runFor(IUrls::Category)
        ->query($data)->getItemFromJson()));

} catch (Exception $e) {
    print_r($e);
}
