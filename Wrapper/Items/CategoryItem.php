<?php

class CategoryItem extends BaseItem
{
    public $priority; //int
    public $priority_home; //int
    public $priority_menu; //int
    public $is_hidden_in_menu; //int
    //Фильтр потомков категории
    public $path; //String
    //Фильтр по уровню категории
    public $level; //int
    public $type; //int
    //Показывать только категории “для взрослых”
    public $is_adult; //int
    public $has_loco_slider; //boolean
    public $has_design; //boolean
    public $has_as_main_design; //boolean
    public $is_item_description_hidden; //boolean
    public $is_for_mobile_app; //boolean
    public $photo; //String
    public $icon; //String
    //Фильтр по адресу категории
    public $full_slug; //String
}
