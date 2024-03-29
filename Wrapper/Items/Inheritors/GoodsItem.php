<?php


class GoodsItem extends BaseItem
{
    public $is_disabled; //int
    public $reason_of_disabling; //object
    public $minimum_order_quantity; //String
    public $price; //double
    public $price_max; //double
    public $price_per_square_meter; //int
    public $price_per_linear_meter; //int
    public $currency; //String
    public $boxtype_id; //int
    public $box_depth; //double
    public $box_height; //int
    public $box_width; //double
    public $in_box; //int
    public $in_set; //int
    public $depth; //double
    public $unit_id; //int
    public $nested_unit_id; //object
    public $width; //double
    public $height; //int
    public $trademark_id; //int
    public $country_id; //int
    public $cart_min_diff; //String
    public $keep_package; //int
    public $per_package; //int
    public $video_file_name; //String
    public $video_file_url; //boolean
    public $series_id; //object
    public $is_hit; //int
    public $is_licensed; //object
    public $is_price_fixed; //int
    public $is_exclusive; //int
    public $is_motley; //int
    public $is_adult; //int
    public $is_protected; //int
    public $offer_id; //object
    public $certificate_type_id; //int
    public $has_usb; //object
    public $has_battery; //object
    public $has_clockwork; //object
    public $has_sound; //object
    public $has_radiocontrol; //object
    public $is_inertial; //object
    public $is_on_ac_power; //object
    public $has_rus_voice; //object
    public $has_rus_pack; //object
    public $has_light; //object
    public $is_day_offer; //object
    public $page_title; //String
    public $page_keywords; //String
    public $page_description; //String
    public $parent_item_id; //int
    public $max_qty; //int
    public $min_qty; //int
    public $modifier_id; //int
    public $modifier_value; //String
    public $qty_multiplier; //int
    public $gift_id; //object
    public $surface_area; //object
    public $linear_meters; //object
    public $is_loco; //int
    public $novelted_at; //object
    public $is_paid_delivery; //int
    public $package_volume; //String
    public $min_age; //object
    public $power; //object
    public $volume; //object
    public $transport_condition_id; //object
    public $has_discount; //int
    public $is_gift; //int
    public $is_boxed; //int
    public $product_volume; //double
    public $box_volume; //int
    public $box_capacity; //int
    public $packing_volume_factor; //int
    public $is_tire_spike; //int
    public $is_tire_run_flat; //int
    public $tire_season_id; //int
    public $tire_diameter_id; //int
    public $tire_width_id; //int
    public $tire_section_height_id; //int
    public $tire_load_index_id; //int
    public $tire_speed_index_id; //int
    public $wheel_lz_id; //int
    public $wheel_width_id; //int
    public $wheel_diameter_id; //int
    public $wheel_dia_id; //int
    public $wheel_pcd_id; //int
    public $wheel_et_id; //int
    public $has_body_drawing; //object
    public $has_cord_case; //object
    public $has_teapot; //object
    public $has_termostat; //object
    public $is_imprintable; //object
    public $isbn; //object
    public $page_count; //object
    public $is_add_to_cart_multiple; //int
    public $supply_period; //int
    public $has_action; //int
    public $has_action_discount_system; //int
    public $has_jewelry_action; //int
    public $has_3_pay_2_action; //int
    public $has_best_fabric; //int
    public $has_best_textile; //int
    public $has_number_one_made_in_russia; //int
    public $photoIndexes; //array(String)
    public $photoVersions; //array(PhotoVersion)
    public $audio_filename; //object
    public $photo_3d_count; //int
    public $is_markdown; //int
    public $is_prepay_needed; //int
    public $is_paid_delivery_ekb; //boolean
    public $mean_rating; //int
    public $comments_count; //int
    public $markdown_reason; //String
    public $is_wholesale; //int
    public $is_wholesale_conservation; //int
    public $type; //int
    public $is_shock_price; //boolean
    public $has_fixed_balance; //boolean
    public $is_recommended; //boolean
    public $currencySign; //String
    public $isEnough; //boolean
    public $isAddToCartMultiple; //boolean
    public $minQty; //int
    public $qtyRule; //String
    public $qty_rules; //String
    public $qty_rules_data; //QtyRulesData
    public $custom_qty_rules_data; //object
    public $pluralNameFormat; //String
    public $inBoxPluralNameFormat; //String
    public $balancePluralNameFormat; //object
    public $can_buy_by_credit; //boolean
    public $supplier_code; //String
    public $weight; //int
    public $has_special_offer; //boolean
    public $has_day_discount; //int
    public $has_erich_krause; //int
    public $has_tm_gamma_gifts; //int
    public $has_superprice_on_line; //int
    public $has_week_discount; //int
    public $has_3days_discount; //int
    public $has_best_fabric_2018; //int
    public $has_pay_later; //int
    public $has_new_rules; //int
    public $has_item_month; //int
    public $action_urls; //ActionUrls
    public $special_offer_id; //int
    public $has_4_pay_2_action; //int
    public $has_take_installments_action; //int
    public $min_sum_order; //String
    public $wholesale_price; //int
    public $is_part; //boolean
    public $is_remote_store; //int
    public $is_small_wholesale_available; //boolean
    public $is_plant; //boolean
    public $color; //String
    public $image_title; //String
    public $image_alt; //String
    public $short_name; //String
    public $is_free_delivery; //boolean
    public $min_sum_for_free_delivery; //int
    public $updated_item_at; //String
    public $img; //String
    public $nestedUnit; //object
    public $date_info; //DateInfo
    public $isEntranceTypeByWeight; //boolean
    public $real_min_qty; //int
    public $photos; //array(Photo)
    public $country; //Country
    public $offer; //object
    public $discountPercent; //int
    public $hasGift; //boolean
    public $hasGiftAssignee; //boolean
    public $isNovelty; //boolean
    public $itemUrl; //String
    public $price_unit; //double
    public $has_volume_discount; //boolean
    public $modifier; //Modifier
    public $size; //String
    public $stuff; //String
    public $trademark; //Trademark
    public $series; //object
    public $ecommerce_variant; //object
    public $category_id; //int
    public $loan_category_id; //int
    public $is_need_rigid_packaging; //boolean
    public $transit_in_settlement; //object
    public $is_item_description_hidden; //boolean
}

