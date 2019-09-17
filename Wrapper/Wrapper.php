<?php

require_once('Wrapper/Items/CategoryItem.php');
require_once('Wrapper/Items/GoodsItem.php');
require_once('Wrapper/Items/AuthorItem.php');
require_once('Wrapper/Items/CurrencyItem.php');
require_once('Wrapper/Items/GoodsInfo/Trademark.php');
require_once('Wrapper/Items/GoodsInfo/Country.php');
require_once('Wrapper/Items/GoodsInfo/DateInfo.php');
require_once('Wrapper/Items/GoodsInfo/QtyRulesData.php');
require_once('Wrapper/Items/GoodsInfo/Modifier.php');

class Wrapper
{
    /**
     * @param string $url
     * @return bool|string
     */
    private function ExecuteCurl(string $url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);
        return $json;
    }

    public function GetCurrencyPage()
    {
        $url = "https://www.sima-land.ru/api/v3/currency/";
        return $this->ExecuteCurl($url);
    }

    public function GetSingleCurrencyById(int $id)
    {
        if($id < 1)
            return null;

        //https://www.sima-land.ru/api/v3/currency/<ID>/
        $url = "https://www.sima-land.ru/api/v3/currency/".$id.'/';
        return $this->ExecuteCurl($url);

    }

    public function GetSingleAuthorById(int $id)
    {
        if($id < 1)
            return null;

        //https://www.sima-land.ru/api/v3/author/<ID>/
        $url = "https://www.sima-land.ru/api/v3/author/".$id.'/';
        return $this->ExecuteCurl($url);
    }

    public function GetAuthorPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        //https://www.sima-land.ru/api/v3/author/
        $url = "https://www.sima-land.ru/api/v3/author/?".$query;
        return $this->ExecuteCurl($url);
    }

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

    public function GetSingleCategoryById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/category/".$id.'/';

        //'https://www.sima-land.ru/api/v3/category/<ID>/'
        return $this->ExecuteCurl($url);
    }

    public function GetSingleGoodsById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/item/".$id.'/';

        //'https://www.sima-land.ru/api/v3/item/<ID>/'
        return $this->ExecuteCurl($url);
    }

    public function GetItemsByCategories(int $categoryId, int $page)
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

        return $this->ExecuteCurl($url);
    }

    public function ParsePageToCategoryItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);
        $arr = array();

        foreach ($page['items'] as $item) {

            $elem = $this->CreateCategoryFromArr($item);

            array_push($arr, $elem);
        }

        return $arr;

    }

    public function ParsePageToGoodsItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateGoodsFromArr($item);
            array_push($arr, $elem);
        }

        return $arr;
    }

    public function ParsePageToAuthorItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateAuthorFromArr($item);
            array_push($arr, $elem);
        }

        return $arr;
    }

    public function ParsePageToCurrencyItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateCurrencyFromArr($item);
            array_push($arr, $elem);
        }

        return $arr;
    }

    public function ParseSingleCategory(string $json)
    {
        if($json === '')
            return null;

        $category = json_decode($json, true);

        return $this->CreateCategoryFromArr($category);

        //return $elem;

    }

    public function ParseSingleAuthor(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateAuthorFromArr($item);
    }

    public function ParseSingleGoods(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateGoodsFromArr($item);
    }

    public function ParseSingleCurrency(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateCurrencyFromArr($item);
    }

    /**
     * @param $category
     * @return CategoryItem
     */
    private function CreateCategoryFromArr($category): CategoryItem
    {
        $elem = new CategoryItem();

        foreach ($elem as $f => $v)
            if(isset($category[$f]))
                $elem->$f = $category[$f];

        return $elem;
    }
    /**
     * @param $item
     * @return GoodsItem
     */
    private function CreateGoodsFromArr($item): GoodsItem
    {
        $elem = new GoodsItem();

        foreach ($elem as $f => $v)
            if(isset($item[$f]))
                $elem->$f = $item[$f];

        return $elem;
    }

    private function CreateAuthorFromArr($item): AuthorItem
    {
        $elem = new AuthorItem();

        foreach ($elem as $f => $v)
            if(isset($item[$f]))
                $elem->$f = $item[$f];

        return $elem;
    }

    private function CreateCurrencyFromArr($item): CurrencyItem
    {
        $elem = new CurrencyItem();

        foreach ($elem as $f => $v)
            if(isset($item[$f]))
                $elem->$f = $item[$f];

        return $elem;
    }

}
