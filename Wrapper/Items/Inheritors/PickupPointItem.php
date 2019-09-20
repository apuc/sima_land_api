<?php


class PickupPointItem extends BaseItem
{
    public $address; //String
    public $phone; //String
    public $email; //String
    public $pickup_point_work_time; //array(PickupPointWorkTime)
    public $coordinates; //String
    public $coordinates_array; //array(double)
}

