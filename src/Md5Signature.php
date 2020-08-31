<?php

namespace Daht\RequestMd5Signature;

class Md5Signature
{
    private $appSecret = "";
    private $signKey = "";
    private $errorMessage = "";


    function __construct($appSecret = "", $signKey = 'sign')
    {
        $this->appSecret = $appSecret;
        $this->signKey = $signKey;
    }

    public function verify($params = [])
    {

        if (!isset($params[$this->signKey])) {
            $this->errorMessage = $this->signKey . " is required ";
            return false;
        }
        $sign = $params[$this->signKey];
        unset($params[$this->signKey]);
        if ($sign !== $this->generate($params)) {
            $this->errorMessage = " signature verify failed ";
            return false;
        }
        return true;
    }

    function generate($params = [])
    {
        $sign = md5(http_build_query(ksort($params)) . "appSecret=" . $this->appSecret);
        return $sign;
    }

    function getErrorMessage()
    {
        return $this->errorMessage;
    }
}