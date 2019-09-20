<?php

trait ObjImporter
{
    protected function getItems($page, $object)
    {
        if (isset($page['items'])) {
            $arr = array();
            foreach ($page['items'] as $item) {
                $elem = $this->createObjFromArr($item, $object);
                array_push($arr, $elem);
            }
            return $arr;
        } else
            return $this->createObjFromArr($page, $object);
    }

    protected function getMeta($page)
    {
        if (isset($page['_meta'])) {
            return $this->createObjFromArr($page['_meta'], "Meta");
        } else return null;
    }

    protected function getLinks($page)
    {
        if (isset($page['_links'])) {
            return $this->createObjFromArr($page['_links'], "Links");
        } else return null;
    }
}
