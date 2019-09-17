<?php

require_once('Wrapper/Items/CategoryItem.php');
require_once('Wrapper/Items/GoodsItem.php');
require_once('Wrapper/Items/AuthorItem.php');
require_once('Wrapper/Items/CurrencyItem.php');
require_once('Wrapper/Items/SeriesItem.php');
require_once('Wrapper/Items/DistrictItem.php');
require_once('Wrapper/Items/SettlementItem.php');
require_once('Wrapper/Items/GiftItem.php');
require_once('Wrapper/Items/CommentItem.php');
require_once('Wrapper/Items/DeliveryAddressItem.php');
require_once('Wrapper/Items/OfferItem.php');
require_once('Wrapper/Items/MaterialItem.php');
require_once('Wrapper/Items/PickupPointItem.php');
require_once('Wrapper/Items/NewsItem.php');
require_once('Wrapper/Items/CarModelItem.php');
require_once('Wrapper/Items/BoxtypeItem.php');
require_once('Wrapper/Items/BarcodeItem.php');
require_once('Wrapper/Items/PaymentTypeItem.php');
require_once('Wrapper/Items/SpecOfferTypeItem.php');
require_once('Wrapper/Items/DeliveryConditionItem.php');
require_once('Wrapper/Items/DeliveryCompanyItem.php');
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

    private function CreateObjectFromArr($item, $object)
    {
        $elem = new $object();

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
            $elem = $this->CreateObjectFromArr($item, "CurrencyItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleCurrency(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "CurrencyItem");
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
            $elem = $this->CreateObjectFromArr($item, "AuthorItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleAuthor(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "AuthorItem");
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
        return $this->ExecuteCurl($url);
    }
    public function GetSingleCategoryById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/category/".$id.'/';

        return $this->ExecuteCurl($url);
    }
    public function ParsePageToCategoryItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);
        $arr = array();

        foreach ($page['items'] as $item) {

            $elem = $this->CreateObjectFromArr($item, "CategoryItem");

            array_push($arr, $elem);
        }

        return $arr;

    }
    public function ParseSingleCategory(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "CategoryItem");
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
            $elem = $this->CreateObjectFromArr($item, "GoodsItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleGoods(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "GoodsItem");
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

        return $this->CreateObjectFromArr($item, "SeriesItem");
    }
    public function ParsePageToSeriesItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "SeriesItem");
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
            $elem = $this->CreateObjectFromArr($item, "DistrictItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleDistrict(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "DistrictItem");
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
            $elem = $this->CreateObjectFromArr($item, "SettlementItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleSettlement(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "SettlementItem");
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
            $elem = $this->CreateObjectFromArr($item, "GiftItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleGift(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item,"GiftItem");
    }
    #endregion

    #region Item-Comment
    public function GetSingleItemCommentById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/item-comment/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetItemCommentsPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/item-comment/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToItemCommentsItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "CommentItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleItemComment(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item,  "CommentItem");
    }
    #endregion

    #region Offer
    public function GetSingleItemOfferById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/offer/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetOffersPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/offer/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToOfferItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "OfferItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleOffer(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "OfferItem");
    }
    #endregion

    #region Delivery-Address
    public function GetSingleDeliveryAddressById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/delivery-address/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetDeliveryAddressPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/delivery-address/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToDeliveryAddressItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "DeliveryAddressItem" );
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleDeliveryAddress(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "DeliveryAddressItem" );
    }
    #endregion

    #region Material
    public function GetMaterialById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/material/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetMaterialPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/material/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToMaterialItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "MaterialItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleMaterial(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "MaterialItem");
    }
    #endregion

    #region Country
    public function GetCountryById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/country/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetCountryPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/country/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToCountryItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "Country");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleCountry(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "Country");
    }
    #endregion

    #region Trademark
    public function GetTrademarkById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/trademark/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetTrademarkPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/trademark/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToTrademarkItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "Trademark");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleTrademark(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "Trademark");
    }
    #endregion

    #region Pickup-Point
    public function GetPickupPointById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/pickup-point/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetPickupPointPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/pickup-point/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToPickupPointItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "PickupPointItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSinglePickupPoint(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "PickupPointItem");
    }
    #endregion

    #region Item-Most-Liked
    public function GetMostLikedById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/item-most-liked/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetMostLikedPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/item-most-liked/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToMostLikedItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "GoodsItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleMostLiked(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "GoodsItem");
    }
    #endregion

    #region News
    public function GetNewsById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/news/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetNewsPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/news/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToNewsItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "NewsItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleNews(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "NewsItem");
    }
    #endregion

    #region Car-Model
    public function GetCarModelById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/car-model/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetCarModelPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/car-model/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToCarModelItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "CarModelItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleCarModel(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "CarModelItem");
    }
    #endregion

    #region Boxtype
    public function GetBoxtypeById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/boxtype/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetBoxtypePage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/boxtype/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToBoxtypeItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "BoxtypeItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleBoxtype(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "BoxtypeItem");
    }
    #endregion

    #region Item-Barcode
    public function GetBarcodeById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/item-barcode/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetBarcodePage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/item-barcode/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToBarcodeItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "BarcodeItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleBarcode(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "BarcodeItem");
    }
    #endregion

    #region Delivery-Company
    public function GetDeliveryCompanyById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/delivery-company/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetDeliveryCompanyPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/delivery-company/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToDeliveryCompanyItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "DeliveryCompanyItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleDeliveryCompany(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "DeliveryCompanyItem");
    }
    #endregion

    #region Delivery-Condition
    public function GetDeliveryConditionById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/delivery-condition/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetDeliveryConditionPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/delivery-condition/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToDeliveryConditionItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "DeliveryConditionItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleDeliveryCondition(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "DeliveryConditionItem");
    }
    #endregion

    #region Payment-Type
    public function GetPaymentTypeById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/payment-type/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetPaymentTypePage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/payment-type/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToPaymentTypeItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "PaymentTypeItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSinglePaymentType(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "PaymentTypeItem");
    }
    #endregion

    #region Special-Offer-Type
    public function GetSpecOfferTypeById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/special-offer-type/".$id.'/';
        return $this->ExecuteCurl($url);
    }
    public function GetSpecOfferTypePage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/special-offer-type/?".$query;
        return $this->ExecuteCurl($url);
    }
    public function ParsePageToSpecOfferTypeItems(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            $elem = $this->CreateObjectFromArr($item, "SpecOfferTypeItem");
            array_push($arr, $elem);
        }

        return $arr;
    }
    public function ParseSingleSpecOfferType(string $json)
    {
        if($json === '')
            return null;

        $item = json_decode($json, true);

        return $this->CreateObjectFromArr($item, "SpecOfferTypeItem");
    }
    #endregion
}
