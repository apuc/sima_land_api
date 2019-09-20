<?php


use Classes\Wrapper\Category;
use Classes\Wrapper\IUrls;

trait PathTrait
{
    private $path;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    public function getNameOfObjFromPath()
    {
       if($this->path == IUrls::Category)
           return CategoryItem::class;
    }
}
