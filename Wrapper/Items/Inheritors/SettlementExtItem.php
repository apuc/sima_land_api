<?php


class SettlementExtItem extends BaseItem
{
    public $pickup_point_comment; //String
    public $pickup_point_header; //String
    public $transport_company_description; //String
    public $is_delivery_to_entrance; //boolean
    public $settlement_id; //int
    public $delivery_direction_id; //int
    public $delivery_price_per_unit_volume; //double
    public $has_card_payment_on_delivery; //boolean
    public $is_paid_delivery; //boolean
    public $has_address_delivery; //boolean
    public $is_regular; //boolean
    public $settlement_osm_id; //int
    public $is_typesetting; //boolean
    public $overall_sale; //double
    public $order_sum_from; //int
    public $order_sum_to; //int
    public $is_agent_priority; //boolean
    public $cost_modifier; //int
    public $currency; //String
}
