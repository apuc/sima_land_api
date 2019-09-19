<?php


namespace Classes\Wrapper;


use http\Exception;

class OurLegalEntity extends Wrapper
{
    public static function run()
    {
        return new self();
    }

    public function getById($id)
    {
        if ($id >= 1)
            $this->json = Wrapper::ExecuteCurl(
                Urls::MainPath . Urls::OurLegalEntity . $id . '/');
        return $this;
    }

    public function getPage($page)
    {
        if ($page >= 1)
            $this->json = Wrapper::ExecuteCurl(
                Urls::MainPath . Urls::OurLegalEntity . "?" . http_build_query(['page' => $page]));
        return $this;
    }

    public function query(array $data)
    {
        if (!empty($data))
            $this->json = Wrapper::ExecuteCurl(
                Urls::MainPath . Urls::OurLegalEntity . "?" . http_build_query($data));
        return $this;
    }

    public function getItemFromJson()
    {
        if ($this->json === '') return null;

        try {
            return $this->getItems($this->CheckStatus($this->ValidateJson($this->json)), "OurLegalEntityItem");
        } catch (Exception $e) {
            throw $e;
        }
    }

}
