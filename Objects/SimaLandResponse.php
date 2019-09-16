<?php

use JMS\Serializer\Annotation\Type;

class SimaLandResponse
{
    /**
     * @Type("array<Item>")
     */
    public $items; //array(Item)
    /**
     * @Type("Objects\Links")
     */
    public $_links; //Links
    /**
     * @Type("Objects\Meta")
     */
    public $_meta; //Meta

}

