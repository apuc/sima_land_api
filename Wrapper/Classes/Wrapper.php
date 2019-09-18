<?php

abstract class Wrapper
{
    protected function ExecuteCurl(string $url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);
        return $json;
    }
    protected function CreateObjectFromArr($item, $object)
    {
        $elem = new $object();

        foreach ($elem as $f => $v)
            if(isset($item[$f]))
                $elem->$f = $item[$f];

        return $elem;
    }
    protected function ValidateJson($json)
    {
        // decode the JSON data
        $result = json_decode($json, true);

        // switch and check possible JSON errors
        switch (json_last_error())
        {
            case JSON_ERROR_NONE:
                $error = ''; // JSON is valid // No error has occurred
                break;
            case JSON_ERROR_DEPTH:
                $error = 'The maximum stack depth has been exceeded.';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error = 'Invalid or malformed JSON.';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error = 'Control character error, possibly incorrectly encoded.';
                break;
            case JSON_ERROR_SYNTAX:
                $error = 'Syntax error, malformed JSON.';
                break;
            // PHP >= 5.3.3
            case JSON_ERROR_UTF8:
                $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
                break;
            // PHP >= 5.5.0
            case JSON_ERROR_RECURSION:
                $error = 'One or more recursive references in the value to be encoded.';
                break;
            // PHP >= 5.5.0
            case JSON_ERROR_INF_OR_NAN:
                $error = 'One or more NAN or INF values in the value to be encoded.';
                break;
            case JSON_ERROR_UNSUPPORTED_TYPE:
                $error = 'A value of a type that cannot be encoded was given.';
                break;
            default:
                $error = 'Unknown JSON error occured.';
                break;
        }

        if ($error !== '')
        {
            throw new Exception($error);
        }

        // everything is OK
        return $result;
    }
    protected function CheckStatus($page)
    {
        if(isset($page['status']))
        {
            if($page['status'] === 404)
            {
                $error = $page['message'];
                throw new Exception($error);
            }
        }
    }

    abstract public function GetPage(int $page);
    abstract public function GetById(int $id);
    abstract public function Query($data);
    abstract public function ParseJson($json);
}



