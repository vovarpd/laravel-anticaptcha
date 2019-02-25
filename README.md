# laravel-anticaptcha

This Laravel package based on:

https://github.com/AdminAnticaptcha/anticaptcha-php
 

## Installation

### Composer

Run the command:
``` bash
$ composer require vovarpd/laravel-anticaptcha
```

Or 

Add laravel-anticaptcha in your composer.json or create a new composer.json:

```js
{
    "require": {
        "vovarpd/laravel-anticaptcha": "^0.1"
    }
}
```

Now tell composer to download the library by running the command:

``` bash
$ php composer.phar install
```

Composer will generate the autoloader file automatically. So you only have to include this.
Typically its located in the vendor dir and its called autoload.php

Then publish config file by running the command:
``` bash
$ php artisan vendor:publish --tag=anticaptcha
```


## Basic Usage:

Set API key in config/anticaptcha.php or .env file.

``` php
<?php

return [
	'key'=>env('ANTICAPTCHA_API_KEY','')
];
```


Dependency Injection example.

``` php
use LaravelAnticaptcha\Anticaptcha\Exceptions\AnticaptchaException;
use LaravelAnticaptcha\Anticaptcha\NoCaptchaProxyless;

public function handle( NoCaptchaProxyless $no_captcha_proxyless ) {
    $no_captcha_proxyless->setVerboseMode(false);
    $no_captcha_proxyless->setWebsiteURL( $step4link_post );
    $no_captcha_proxyless->setWebsiteKey( $recaptcha_sitekey );
    $no_captcha_proxyless->createTask();
    $taskId = $no_captcha_proxyless->getTaskId();
    $no_captcha_proxyless->waitForResult();
    dump($no_captcha_proxyless->getTaskSolution());
}

```
