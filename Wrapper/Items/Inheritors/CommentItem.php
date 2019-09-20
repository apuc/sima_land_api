<?php


class CommentItem extends BaseItem
{
    public $rating_id; //int
    public $item_id; //int
    public $user_id; //int
    public $message; //String
    public $is_anonymously; //boolean
    public $item_comment_site_id; //object
    public $item_comment_status_id; //int
    public $moderator_comment; //String
    public $message_reply; //String
    public $pros; //object
    public $cons; //object
}
