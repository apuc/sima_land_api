<?php


class JpOrganizerItem extends BaseItem
{
    public $user_id; //int
    public $phone; //String
    public $rating; //int
    public $is_payment_type_cash; //boolean
    public $moderation_status; //int
    public $is_prepayment; //boolean
    public $min_request_sum; //int
    public $is_deliverer; //boolean
    public $is_agent; //boolean
    public $settlement_id; //int
    public $settlement_osm_id; //int?
    public $is_involved_distribution; //boolean
    public $organizer_info; //object
}
