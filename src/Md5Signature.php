<?php

namespace Daht\RequestMd5Signature;

class Md5Signature
{
    private $appSecret = "";
    private $signKey = "";
    private $errorMessage = "";
    private $generateSign = "";


    function __construct($appSecret = "", $signKey = 'sign')
    {
        $this->appSecret = $appSecret;
        $this->signKey = $signKey;
    }

    public function getGenerateSign(): string
    {
        return $this->generateSign;
    }

    public function verify($params = []): bool
    {

        if (!isset($params[$this->signKey])) {
            $this->errorMessage = $this->signKey . " is required ";
            return false;
        }
        $sign = $params[$this->signKey];
        unset($params[$this->signKey]);
        $this->generateSign = $this->generate($params);
        if ($sign !== $this->generateSign) {
            $this->errorMessage = " signature verify failed ";
            return false;
        }
        return true;
    }

    private function generate($params = []): string
    {
        ksort($params);
        return md5(http_build_query($params) . "appSecret=" . $this->appSecret);
    }

    function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}