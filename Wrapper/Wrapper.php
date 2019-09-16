<?php

require_once('Wrapper/Items/CategoryItem.php');
require_once('Wrapper/Items/GoodsItem.php');
require_once('Wrapper/Items/GoodsInfo/Trademark.php');

class Wrapper
{
    public function GetCategoryPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/category/?".$query;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);

        return $json;
    }

    public function GetItemByCategories(int $categoryId, int $page)
    {
        if($page < 1)
            return null;
        if($categoryId < 1)
            return null;

        $query = http_build_query([
            'category_id' => $categoryId,
            'page' => $page
        ]);
        $url = "https://www.sima-land.ru/api/v3/item/?".$query;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);

        return $json;
    }

    public function ParsePageToCategoryItem(string $json)
    {
        if($json === '')
            return null;
        else {

            $page = json_decode($json, true);

            $arr = array();

            foreach ($page['items'] as $item) {
                $elem = new CategoryItem();

                $elem->id = $item['id'];
                $elem->name = $item['name'];
                $elem->photo = $item['photo'];
                $elem->icon = $item['icon'];
                $elem->full_slug = $item['full_slug'];

                array_push($arr, $elem);
            }

            return $arr;
        }
    }


    public function ParsePageToGoodsItem(string $json)
    {
        if($json === '')
            return null;
        else {

            $page = json_decode($json, true);

            $arr = array();

            foreach ($page['items'] as $item) {

                //$elem = new GoodsItem();

                echo $item['id'];
                echo "\n";
                echo $item['name'];
                echo "\n";
                echo $item['slug'];
                echo "\n";
                echo $item['price'];
                echo "\n";
                echo $item['price_max'];
                echo "\n";
                echo $item['currency'];
                echo "\n";
                if($item['trademark'] != null)
                {
                    print_r( $item['trademark'] );

                }
                echo "\n";
                echo $item['img'];
                echo "\n";
                //echo $item[''];

                //array_push($arr, $elem);
            }

            //return $arr;

        }
    }
}
