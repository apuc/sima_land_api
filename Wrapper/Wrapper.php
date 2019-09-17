<?php

require_once('Wrapper/Items/CategoryItem.php');
require_once('Wrapper/Items/GoodsItem.php');
require_once('Wrapper/Items/AuthorItem.php');
require_once('Wrapper/Items/CurrencyItem.php');
require_once('Wrapper/Items/SeriesItem.php');
require_once('Wrapper/Items/DistrictItem.php');
require_once('Wrapper/Items/SettlementItem.php');
require_once('Wrapper/Items/GiftItem.php');
require_once('Wrapper/Items/GoodsInfo/Trademark.php');
require_once('Wrapper/Items/GoodsInfo/Country.php');
require_once('Wrapper/Items/GoodsInfo/DateInfo.php');
require_once('Wrapper/Items/GoodsInfo/QtyRulesData.php');
require_once('Wrapper/Items/GoodsInfo/Modifier.php');

class Wrapper
{
    #region Private methods

    #region curl
    private function ExecuteCurl(string $url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);
        return $json;
    }
    #endregion

    private function CreateCategoryFromArr($category): CategoryItem
    {
        $elem = new CategoryItem();

        foreach ($elem as $f => $v)
            if(isset($category[$f]))
                $elem->$f = $category[$f];

        return $elem;
    }
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
    private function CreateSeriesFromArr($item): SeriesItem
    {
        $elem = new SeriesItem();

        foreach ($elem as $f => $v)
            if(isset($item[$f]))
                $elem->$f = $item[$f];

        return $elem;
    }
    private function CreateDistrictFromArr($item): DistrictItem
    {
        $elem = new DistrictItem();

        foreach ($elem as $f => $v)
            if(isset($item[$f]))
                $elem->$f = $item[$f];

        return $elem;
    }
    private function CreateSettlementFromArr($item): SettlementItem
    {
        $elem = new SettlementItem();

        foreach ($elem as $f => $v)
            if(isset($item[$f]))
                $elem->$f = $item[$f];

        return $elem;
    }
    private function CreateGiftFromArr($item): GiftItem
    {
        $elem = new GiftItem();

        foreach ($elem as $f => $v)
            if(isset($item[$f]))
                $elem->$f = $item[$f];

        return $elem;
    }
    #endregion

    #region Public methods

    #region Currency
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
    public function ParseSingleCurrency(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateCurrencyFromArr($item);
    }
    #endregion

    #region Author
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
    public function ParseSingleAuthor(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateAuthorFromArr($item);
    }
    #endregion

    #region Category
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
    public function ParseSingleCategory(string $json)
    {
        if($json === '')
            return null;

        $category = json_decode($json, true);

        return $this->CreateCategoryFromArr($category);

        //return $elem;

    }
    #endregion

    #region Goods
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
    public function ParseSingleGoods(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateGoodsFromArr($item);
    }
    #endregion

    #region Series
    public function GetSingleSeriesById(int $id)
    {
        if($id < 1)
            return null;

        //https://www.sima-land.ru/api/v3/series/<ID>/
        $url = "https://www.sima-land.ru/api/v3/series/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetSeriesPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/series/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParseSingleSeries(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateSeriesFromArr($item);
    }
    public function ParsePageToSeriesItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateSeriesFromArr($item);
            array_push($arr, $elem);
        }

        return $arr;
    }
    #endregion

    #region District
    public function GetSingleDistrictById(int $id)
    {
        if($id < 1)
            return null;

        //https://www.sima-land.ru/api/v3/district/<ID>/
        $url = "https://www.sima-land.ru/api/v3/district/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetDistrictsPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/district/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToDistrictsItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateDistrictFromArr($item);
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleDistrict(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateDistrictFromArr($item);
    }
    #endregion

    #region Settlement
    public function GetSingleSettlementById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/settlement/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetSettlementsPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/settlement/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToSettlementsItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateSettlementFromArr($item);
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleSettlement(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateSettlementFromArr($item);
    }
    #endregion

    #region Gift
    public function GetSingleGiftById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/gift/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetGiftsPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/gift/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToGiftsItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateGiftFromArr($item);
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleGift(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateGiftFromArr($item);
    }
    #endregion

    #endregion

}
