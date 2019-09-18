<?php


class Goods extends Wrapper
{
    private $url = "https://www.sima-land.ru/api/v3/item/";
    private $json = '';

    public static function run()
    {
        return new self();
    }

    public function getById($id)
    {
        if ($id >= 1)
            $this->json = Wrapper::ExecuteCurl($this->url . $id . '/');
        return $this;
    }

    public function getPage($page)
    {
        if ($page >= 1)
            $this->json = Wrapper::ExecuteCurl($this->url . "?" . http_build_query(['page' => $page]));
        return $this;
    }

    public function getAllMostLiked()
    {
        $this->json = Wrapper::ExecuteCurl('https://www.sima-land.ru/api/v3/item-most-liked/');
        return $this;
    }

    public function query(array $data)
    {
        if (!empty($data))
            $this->json = Wrapper::ExecuteCurl($this->url . "?" . http_build_query($data));
        return $this;
    }

    public function jsonToObj()
    {
        if ($this->json === '') return null;

        try {
            return $this->getObjFromJson($this->CheckStatus($this->ValidateJson($this->json)), "GoodsItem");
        } catch (Exception $e) {
            throw $e;
        }
    }
}
