
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

use Daht\RequestMd5Signature;
$param = [
    "user_name"=>'daht'
];
$md5Signature= new Md5Signature('you app secret');
if(!$md5Signature->verify($param)){
    return $md5Signature->getErrorMessage();
}

```

## License

MIT
