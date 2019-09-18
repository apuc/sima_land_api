<?php

abstract class Wrapper
{
    protected function ExecuteCurl(string $url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);
        return $json;
    }
    protected function CreateObjectFromArr($item, $object)
    {
        $elem = new $object();

        foreach ($elem as $f => $v)
            if(isset($item[$f]))
                $elem->$f = $item[$f];

        return $elem;
    }


    abstract public function GetPage(int $page);
    abstract public function GetById(int $id);
    abstract public function Query($data);
    abstract public function ParseJson($json);
}



