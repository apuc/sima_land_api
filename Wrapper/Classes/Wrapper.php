<?php

namespace Classes\Wrapper;

use IWrapper;
use JsonTrait;
use ParserTrait;
use PathTrait;
use ObjImporter;

use Links;
use Meta;

class Wrapper implements IWrapper
{
    use JsonTrait;
    use PathTrait;
    use ObjImporter;
    use ParserTrait;

    /**
     * Wrapper constructor.
     * @param $path
     */
    public function __construct($path)
    {
        //echo $path;
        $this->path = $path;
    }

    public static function runFor($path)
    {
        return new self($path);
    }

    public function getById($id)
    {
        if ($id >= 0)
            $this->json = $this->ExecuteCurl(
                IUrls::MainPath . $this->path . $id . '/');
        return $this;
    }


    public function getPage($page)
    {
        if ($page >= 1)
            $this->json = Wrapper::ExecuteCurl(
                IUrls::MainPath . $this->path . "?" . http_build_query(['page' => $page]));
        return $this;
    }

    public function query(array $data)
    {
        if (!empty($data))
            $this->json = Wrapper::ExecuteCurl(
                IUrls::MainPath . $this->path . "?" . http_build_query($data));
        return $this;
    }

    public function getItemFromJson()
    {
        if ($this->json === '') return null;

        try {
            return $this->getItems($this->CheckStatus($this->ValidateJson($this->json)), $this->getNameOfObjFromPath());
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getMetaFromJson(): Meta
    {
        if ($this->json === '') return null;

        try {
            return $this->getMeta($this->CheckStatus($this->ValidateJson($this->json)));
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getLinksFromJson(): Links
    {
        if ($this->json === '') return null;

        try {
            return $this->getLinks($this->CheckStatus($this->ValidateJson($this->json)));
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

