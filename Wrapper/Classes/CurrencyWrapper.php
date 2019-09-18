<?php

include_once('Wrapper/Classes/Wrapper.php');
include_once('Wrapper/Items/CurrencyItem.php');

class CurrencyWrapper extends Wrapper
{

    public function GetPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/currency/?".$query;
        return $this->ExecuteCurl($url);
    }

    public function GetById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/currency/".$id.'/';
        return $this->ExecuteCurl($url);
    }

    public function Query($data)
    {
        $query = http_build_query( $data );
        $url = "https://www.sima-land.ru/api/v3/currency/?".$query;

        return $this->ExecuteCurl($url);
    }

    public function ParseJson($json)
    {
        if($json === '')
            return null;

        try
        {
            $page = $this->ValidateJson($json);
            $this->CheckStatus($page);
        }
        catch (Exception $e)
        {
            throw $e;
        }

        if(isset($page['items'] ))
        {
            $arr = array();
            foreach ($page['items'] as $item)
            {
                $elem = $this->CreateObjectFromArr($item, "CurrencyItem");
                array_push($arr, $elem);
            }
            return $arr;
        }
        else
            return $this->CreateObjectFromArr($page, "CurrencyItem");
    }
}