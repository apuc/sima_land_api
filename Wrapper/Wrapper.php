<?php

require_once ('Wrapper/CategoryItem.php');

class Wrapper
{
    public function GetCategoryPage(int $page)
    {
        if($page < 1)
            return null;

        $curl = curl_init('https://www.sima-land.ru/api/v3/category/?page=$page');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);

        return $json;
    }

    public function ParsePageToItem(string $json)
    {
        if($json !== '')
        {
            $page = json_decode($json, true);

            $arr = array();

            foreach($page['items'] as $item)
            {
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
        else return null;
    }
}
