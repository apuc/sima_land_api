<?php

include_once('Wrapper/Classes/Wrapper.php');
include_once('Wrapper/Items/CategoryItem.php');

class CategoryWrapper extends Wrapper
{
    public function GetPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/category/?".$query;
        return $this->ExecuteCurl($url);
    }

    public function GetById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/category/".$id.'/';

        return $this->ExecuteCurl($url);
    }

    public function Query($data)
    {
        //https://www.sima-land.ru/api/v3/category/?path=2&level=2

        $query = http_build_query( $data );
        $url = "https://www.sima-land.ru/api/v3/category/?".$query;

        return $this->ExecuteCurl($url);
    }

    public function ParseJson($json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        if(isset($page['items'] ))
        {
            $arr = array();
            foreach ($page['items'] as $item)
            {
                $elem = $this->CreateObjectFromArr($item, "CategoryItem");
                array_push($arr, $elem);
            }
            return $arr;
        }
        else
            return $this->CreateObjectFromArr($page, "CategoryItem");
    }
}
