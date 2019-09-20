<?php


interface IWrapper
{
    public function getById($id);

    public function getPage($page);

    public function query(array $data);

    public function getItemFromJson();

    public function getMetaFromJson(): Meta;

    public function getLinksFromJson(): Links;
}
