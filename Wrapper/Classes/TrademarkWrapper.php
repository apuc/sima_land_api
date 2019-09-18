<?php

include_once('Wrapper/Classes/Wrapper.php');
include_once('Wrapper/Items/GoodsInfo/Trademark.php');

class TrademarkWrapper extends Wrapper
{

    public function GetPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/trademark/?".$query;
        return $this->ExecuteCurl($url);
    }

    public function GetById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/trademark/".$id.'/';
        return $this->ExecuteCurl($url);
    }

    public function Query($data)
    {
        if (!empty($data))
        {
            $query = http_build_query($data);
            $url = "https://www.sima-land.ru/api/v3/trademark/?" . $query;

            return $this->ExecuteCurl($url);
        }
        return null;
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
                $elem = $this->CreateObjectFromArr($item, "Trademark");
                array_push($arr, $elem);
            }
            return $arr;
        }
        else
            return $this->CreateObjectFromArr($page, "Trademark");
    }
}