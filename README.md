
#Md5Signature

- This package used for PHP signature

## Requirement

1. PHP >= 7.0

## Installation

```shell
$ composer require daht/request-md5-signature
```

## Usage

基本使用（以服务端为例）:

```php
<?php

use Daht\RequestMd5Signature\Md5Signature;
$param = [
    "user_name"=>'daht'
];

$md5Signature= new Md5Signature('you app secret','you sign key');


//生成sign
$sign = $md5Signature->generate($param);


//验证sign
if(!$md5Signature->verify($param)){
    return $md5Signature->getErrorMessage();
}

```

## License

MIT
