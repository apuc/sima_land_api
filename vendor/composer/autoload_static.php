<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit92ebd324df36a7db2111e8bed48013af
{
    public static $classMap = array (
        'AuthorItem' => __DIR__ . '/../..' . '/Wrapper/Items/AuthorItem.php',
        'BarcodeItem' => __DIR__ . '/../..' . '/Wrapper/Items/BarcodeItem.php',
        'BoxtypeItem' => __DIR__ . '/../..' . '/Wrapper/Items/BoxtypeItem.php',
        'CarModelItem' => __DIR__ . '/../..' . '/Wrapper/Items/CarModelItem.php',
        'CategoryItem' => __DIR__ . '/../..' . '/Wrapper/Items/CategoryItem.php',
        'CertificateTypeItem' => __DIR__ . '/../..' . '/Wrapper/Items/CertificateTypeItem.php',
        'Classes\\Wrapper\\Author' => __DIR__ . '/../..' . '/Wrapper/Classes/Author.php',
        'Classes\\Wrapper\\Category' => __DIR__ . '/../..' . '/Wrapper/Classes/Category.php',
        'Classes\\Wrapper\\Comment' => __DIR__ . '/../..' . '/Wrapper/Classes/Comment.php',
        'Classes\\Wrapper\\Country' => __DIR__ . '/../..' . '/Wrapper/Classes/Country.php',
        'Classes\\Wrapper\\Currency' => __DIR__ . '/../..' . '/Wrapper/Classes/Currency.php',
        'Classes\\Wrapper\\DeliveryAddress' => __DIR__ . '/../..' . '/Wrapper/Classes/DeliveryAddress.php',
        'Classes\\Wrapper\\District' => __DIR__ . '/../..' . '/Wrapper/Classes/District.php',
        'Classes\\Wrapper\\Gift' => __DIR__ . '/../..' . '/Wrapper/Classes/Gift.php',
        'Classes\\Wrapper\\Goods' => __DIR__ . '/../..' . '/Wrapper/Classes/Goods.php',
        'Classes\\Wrapper\\Material' => __DIR__ . '/../..' . '/Wrapper/Classes/Material.php',
        'Classes\\Wrapper\\Offer' => __DIR__ . '/../..' . '/Wrapper/Classes/Offer.php',
        'Classes\\Wrapper\\Series' => __DIR__ . '/../..' . '/Wrapper/Classes/Series.php',
        'Classes\\Wrapper\\Settlement' => __DIR__ . '/../..' . '/Wrapper/Classes/Settlement.php',
        'Classes\\Wrapper\\Urls' => __DIR__ . '/../..' . '/Wrapper/Classes/Urls.php',
        'Classes\\Wrapper\\Wrapper' => __DIR__ . '/../..' . '/Wrapper/Classes/Wrapper.php',
        'CommentItem' => __DIR__ . '/../..' . '/Wrapper/Items/CommentItem.php',
        'Country' => __DIR__ . '/../..' . '/Wrapper/Items/GoodsInfo/Country.php',
        'CurrencyItem' => __DIR__ . '/../..' . '/Wrapper/Items/CurrencyItem.php',
        'DateInfo' => __DIR__ . '/../..' . '/Wrapper/Items/GoodsInfo/DateInfo.php',
        'DeliveryAddressItem' => __DIR__ . '/../..' . '/Wrapper/Items/DeliveryAddressItem.php',
        'DeliveryCompanyItem' => __DIR__ . '/../..' . '/Wrapper/Items/DeliveryCompanyItem.php',
        'DeliveryConditionItem' => __DIR__ . '/../..' . '/Wrapper/Items/DeliveryConditionItem.php',
        'DistrictItem' => __DIR__ . '/../..' . '/Wrapper/Items/DistrictItem.php',
        'GiftItem' => __DIR__ . '/../..' . '/Wrapper/Items/GiftItem.php',
        'GoodsItem' => __DIR__ . '/../..' . '/Wrapper/Items/GoodsItem.php',
        'MaterialItem' => __DIR__ . '/../..' . '/Wrapper/Items/MaterialItem.php',
        'Modifier' => __DIR__ . '/../..' . '/Wrapper/Items/GoodsInfo/Modifier.php',
        'NewsItem' => __DIR__ . '/../..' . '/Wrapper/Items/NewsItem.php',
        'OfferItem' => __DIR__ . '/../..' . '/Wrapper/Items/OfferItem.php',
        'PaymentTypeItem' => __DIR__ . '/../..' . '/Wrapper/Items/PaymentTypeItem.php',
        'Photo' => __DIR__ . '/../..' . '/Wrapper/Items/GoodsInfo/Photo.php',
        'PickupPointItem' => __DIR__ . '/../..' . '/Wrapper/Items/PickupPointItem.php',
        'PickupPointWorkTime' => __DIR__ . '/../..' . '/Wrapper/Items/PickupPointTime/PickupPointWorkTime.php',
        'QtyRulesData' => __DIR__ . '/../..' . '/Wrapper/Items/GoodsInfo/QtyRulesData.php',
        'SeriesItem' => __DIR__ . '/../..' . '/Wrapper/Items/SeriesItem.php',
        'SettlementItem' => __DIR__ . '/../..' . '/Wrapper/Items/SettlementItem.php',
        'SpecOfferTypeItem' => __DIR__ . '/../..' . '/Wrapper/Items/SpecOfferTypeItem.php',
        'Trademark' => __DIR__ . '/../..' . '/Wrapper/Items/GoodsInfo/Trademark.php',
        'WorkTime' => __DIR__ . '/../..' . '/Wrapper/Items/PickupPointTime/WorkTime.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit92ebd324df36a7db2111e8bed48013af::$classMap;

        }, null, ClassLoader::class);
    }
}
