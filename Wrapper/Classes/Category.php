<?php

class Category extends Wrapper
{
    private static $url= "https://www.sima-land.ru/api/v3/category";
    private static $json = '';

    private static $_instance = null;

    private function __construct () { }

    public static function getInstance ()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public static function query(array $data) : self
    {
        if (!empty($data)) {
            self::$json = Wrapper::ExecuteCurl(self::$url."/?".http_build_query( $data ));
        }
        return self::$_instance;
    }

    public static function JsonToObj()
    {
        if(self::$json === '') return null;

        try {
            return self::getObjFromJson(self::CheckStatus(self::ValidateJson(self::$json)));
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }
}
