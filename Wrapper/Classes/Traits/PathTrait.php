<?php

use Classes\Wrapper\IUrls;

trait PathTrait
{
    private $path;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    public function getNameOfObjFromPath()
    {
        if ($this->path == IUrls::Category)
            return CategoryItem::class;
        if ($this->path == IUrls::Goods)
            return GoodsItem::class;
        if ($this->path == IUrls::GoodsMostLiked)
            return GoodsItem::class;
        if ($this->path == IUrls::FilterPage)
            return FilterPageItem::class;
        if ($this->path == IUrls::Gift)
            return GiftItem::class;
        if ($this->path == IUrls::Series)
            return SeriesItem::class;
        if ($this->path == IUrls::PickupPoint)
            return PickupPointItem::class;
        if ($this->path == IUrls::Offer)
            return OfferItem::class;
        if ($this->path == IUrls::Unit)
            return UnitItem::class;
        if ($this->path == IUrls::Wholesale)
            return WholesaleItem::class;
        if ($this->path == IUrls::VolumeDiscount)
            return VolumeDiscountItem::class;
        if ($this->path == IUrls::Settlement)
            return SettlementItem::class;
        if ($this->path == IUrls::SettlementExt)
            return SettlementExtItem::class;
        if ($this->path == IUrls::PhotoSize)
            return PhotoSizeItem::class;
        if ($this->path == IUrls::Option)
            return OptionItem::class;
        if ($this->path == IUrls::JpOrganizer)
            return JpOrganizerItem::class;
        if ($this->path == IUrls::News)
            return NewsItem::class;
        if ($this->path == IUrls::PaymentType)
            return PaymentTypeItem::class;
        if ($this->path == IUrls::NewsComment)
            return NewsCommentItem::class;
        if ($this->path == IUrls::Manager)
            return ManagerItem::class;
        if ($this->path == IUrls::AttrGoods)
            return AttrGoodsItem::class;
        if ($this->path == IUrls::Attr)
            return AttrItem::class;
        if ($this->path == IUrls::Country)
            return Country::class;
        if ($this->path == IUrls::Trademark)
            return Trademark::class;
        if ($this->path == IUrls::Comment)
            return CommentItem::class;
        if ($this->path == IUrls::ContactGroup)
            return ContactGroupItem::class;
        if ($this->path == IUrls::Currency)
            return CurrencyItem::class;
        if ($this->path == IUrls::DeliveryAddress)
            return DeliveryAddressItem::class;
        if ($this->path == IUrls::DeliveryCompany)
            return DeliveryCompanyItem::class;
        if ($this->path == IUrls::DeliveryCondition)
            return DeliveryConditionItem::class;
        if ($this->path == IUrls::DeliveryDirection)
            return DeliveryDirectionItem::class;
        if ($this->path == IUrls::DeliveryInterval)
            return DeliveryIntervalItem::class;
        if ($this->path == IUrls::DeliveryTime)
            return DeliveryTimeItem::class;
        if ($this->path == IUrls::District)
            return DistrictItem::class;
        if ($this->path == IUrls::DrawingCompetition)
            return DrawingCompetitionItem::class;
        if ($this->path == IUrls::Barcode)
            return BarcodeItem::class;
        if ($this->path == IUrls::CarModel)
            return CarModelItem::class;
        if ($this->path == IUrls::CarModification)
            return CarModificationItem::class;
        if ($this->path == IUrls::ClaimReasonType)
            return ClaimReasonTypeItem::class;
        if ($this->path == IUrls::ClaimResponseCommentPhoto)
            return ClaimResponseCommentPhotoItem::class;
        else return BaseItem::class;
    }
}
