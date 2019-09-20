<?php


trait JsonTrait
{
    private $json = '';

    /**
     * @return string
     */
    public function getJson(): string
    {
        return $this->json;
    }

    /**
     * @param string $json
     */
    public function setJson(string $json): void
    {
        $this->json = $json;
    }

    protected static function ExecuteCurl(string $url): string
    {
        //echo $url . "\n";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);
        return $json;
    }
}
