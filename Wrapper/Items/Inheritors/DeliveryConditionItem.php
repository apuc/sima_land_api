<?php


class DeliveryConditionItem extends BaseItem
{
    public $settlement_id; //long
    public $delivery_type_id; //int
    public $sum; //int
    public $percent; //int
    public $markup; //int
    public $settlement_osm_id; //object
}
