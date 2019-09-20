<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit92ebd324df36a7db2111e8bed48013af
{
    public static $classMap = array (
        'AttrGoodsItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/AttrGoodsItem.php',
        'AttrItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/AttrItem.php',
        'BarcodeItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/BarcodeItem.php',
        'BaseItem' => __DIR__ . '/../..' . '/Wrapper/Items/Base/BaseItem.php',
        'CarModelItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/CarModelItem.php',
        'CarModificationItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/CarModificationItem.php',
        'CategoryItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/CategoryItem.php',
        'ClaimReasonTypeItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/ClaimReasonTypeItem.php',
        'ClaimResponseCommentPhotoItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/ClaimResponseCommentPhotoItem.php',
        'Classes\\Wrapper\\IUrls' => __DIR__ . '/../..' . '/Wrapper/Classes/Interfaces/IUrls.php',
        'Classes\\Wrapper\\Wrapper' => __DIR__ . '/../..' . '/Wrapper/Classes/Wrapper.php',
        'CommentItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/CommentItem.php',
        'ContactGroupItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/ContactGroupItem.php',
        'Country' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/Country.php',
        'CurrencyItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/CurrencyItem.php',
        'DeliveryAddressItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/DeliveryAddressItem.php',
        'DeliveryCompanyItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/DeliveryCompanyItem.php',
        'DeliveryConditionItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/DeliveryConditionItem.php',
        'DeliveryDirectionItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/DeliveryDirectionItem.php',
        'DeliveryIntervalItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/DeliveryIntervalItem.php',
        'DeliveryTimeItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/DeliveryTimeItem.php',
        'DistrictItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/DistrictItem.php',
        'DrawingCompetitionItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/DrawingCompetitionItem.php',
        'FilterPageItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/FilterPageItem.php',
        'GiftItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/GiftItem.php',
        'GoodsItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/GoodsItem.php',
        'IWrapper' => __DIR__ . '/../..' . '/Wrapper/Classes/Interfaces/IWrapper.php',
        'JpOrganizerItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/JpOrganizerItem.php',
        'JsonTrait' => __DIR__ . '/../..' . '/Wrapper/Classes/Traits/JsonTrait.php',
        'Links' => __DIR__ . '/../..' . '/Wrapper/Items/Base/Links.php',
        'ManagerItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/ManagerItem.php',
        'Meta' => __DIR__ . '/../..' . '/Wrapper/Items/Base/Meta.php',
        'NewsCommentItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/NewsCommentItem.php',
        'NewsItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/NewsItem.php',
        'ObjImporter' => __DIR__ . '/../..' . '/Wrapper/Classes/Traits/ObjImporter.php',
        'OfferItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/OfferItem.php',
        'OptionItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/OptionItem.php',
        'ParserTrait' => __DIR__ . '/../..' . '/Wrapper/Classes/Traits/ParserTrait.php',
        'PathTrait' => __DIR__ . '/../..' . '/Wrapper/Classes/Traits/PathTrait.php',
        'PaymentTypeItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/PaymentTypeItem.php',
        'PhotoSizeItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/PhotoSizeItem.php',
        'PickupPointItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/PickupPointItem.php',
        'SeriesItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/SeriesItem.php',
        'SettlementExtItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/SettlementExtItem.php',
        'SettlementItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/SettlementItem.php',
        'Trademark' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/Trademark.php',
        'UnitItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/UnitItem.php',
        'VolumeDiscountItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/VolumeDiscountItem.php',
        'WholesaleItem' => __DIR__ . '/../..' . '/Wrapper/Items/Inheritors/WholesaleItem.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit92ebd324df36a7db2111e8bed48013af::$classMap;

        }, null, ClassLoader::class);
    }
}
