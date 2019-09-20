<?php
require 'vendor/autoload.php';

use Classes\Wrapper\IUrls;
use Classes\Wrapper\Wrapper;


/*try {
    print_r(Category::run()
        ->getById(1)
        ->getItemFromJson());
}
catch (Exception $e)
{
    echo $e;
}*/

try {

    $data = array(
        'path'=>'2',
        'level'=>'2');

    print_r(Wrapper::runFor(IUrls::Category)
        ->query($data)->getItemFromJson()
    );
} catch (\Exception $e) {
    print_r($e);
}
