<?php

namespace Classes\Wrapper;

class Goods extends Wrapper
{
    private $json = '';

    public static function run()
    {
        return new self();
    }

    public function getById($id)
    {
        if ($id >= 1)
            $this->json = Wrapper::ExecuteCurl(Urls::MainPath . Urls::Goods . $id . '/');
        return $this;
    }

    public function getPage($page)
    {
        if ($page >= 1)
            $this->json = Wrapper::ExecuteCurl(Urls::MainPath . Urls::Goods . "?" . http_build_query(['page' => $page]));
        return $this;
    }

    public function getAllMostLiked()
    {
        $this->json = Wrapper::ExecuteCurl(Urls::MainPath . Urls::GoodsMostLiked);
        return $this;
    }

    public function query(array $data)
    {
        if (!empty($data))
            $this->json = Wrapper::ExecuteCurl(Urls::MainPath . Urls::Goods . "?" . http_build_query($data));
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
