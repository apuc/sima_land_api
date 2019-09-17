<?php

require_once('Wrapper/Items/CategoryItem.php');
require_once('Wrapper/Items/GoodsItem.php');
require_once('Wrapper/Items/GoodsInfo/Trademark.php');
require_once('Wrapper/Items/GoodsInfo/Country.php');
require_once('Wrapper/Items/GoodsInfo/DateInfo.php');
require_once('Wrapper/Items/GoodsInfo/QtyRulesData.php');
require_once('Wrapper/Items/GoodsInfo/Modifier.php');

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

    public function ParseSingleCategory(string $json)
    {
        if($json === '')
            return null;

        $category = json_decode($json, true);

        return $this->CreateCategoryFromArr($category);

        //return $elem;

    }

    /**
     * @param $category
     * @return CategoryItem
     */
    public function CreateCategoryFromArr($category): CategoryItem
    {
        $elem = new CategoryItem();

        foreach ($elem as $f => $v)
            if(isset($category[$f]))
                $elem->$f = $category[$f];

        return $elem;
    }

    public function ParseSingleGoods(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateGoodsFromArr($item);
    }

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

    /**
     * @param $item
     * @return GoodsItem
     */
    public function CreateGoodsFromArr($item): GoodsItem
    {
        $elem = new GoodsItem();

        foreach ($elem as $f => $v)
            if(isset($item[$f]))
                $elem->$f = $item[$f];

        return $elem;
    }

}
