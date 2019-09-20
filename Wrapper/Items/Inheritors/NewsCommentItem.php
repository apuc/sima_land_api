<?php


class NewsCommentItem extends BaseItem
{
    public $news_id; //int
    public $user_id; //int
    public $is_anonymously; //boolean
    public $message; //String
    public $comment_status_id; //int
    public $message_reply; //String
}
