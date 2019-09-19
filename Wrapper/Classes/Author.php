<?php


namespace Classes\Wrapper;


class Author extends Wrapper
{
    private $json = '';

    public static function run()
    {
        return new self();
    }

    public function getById($id)
    {
        if ($id >= 1)
            $this->json = Wrapper::ExecuteCurl(
                Urls::MainPath.Urls::Author . $id . '/');
        return $this;
    }

    public function getPage($page)
    {
        if ($page >= 1)
            $this->json = Wrapper::ExecuteCurl(
                Urls::MainPath.Urls::Author . "?" . http_build_query(['page' => $page]));
        return $this;
    }

    public function query(array $data)
    {
        if (!empty($data))
            $this->json = Wrapper::ExecuteCurl(
                Urls::MainPath.Urls::Author . "?" . http_build_query($data));
        return $this;
    }
    public function jsonToObj()
    {
        if ($this->json === '') return null;

        try {
            return $this->getObjFromJson($this->CheckStatus($this->ValidateJson($this->json)), "AuthorItem");
        } catch (Exception $e) {
            throw $e;
        }
    }
    /**
     * @return string
     */
    public function getJson(): string
    {
        return $this->json;
    }
}
