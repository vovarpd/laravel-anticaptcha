<?php
namespace LaravelAnticaptcha\Anticaptcha;

$api = new ImageToText();
$api->setVerboseMode(true);
        
//your anti-captcha.com account key
$api->setKey(readline("You API key: "));

//setting file
$api->setFile("capcha.jpg");

if (!$api->createTask()) {
    $api->debout("API v2 send failed - ".$api->getErrorMessage(), "red");
    return false;
}

$taskId = $api->getTaskId();


if (!$api->waitForResult()) {
    $api->debout("could not solve captcha", "red");
    $api->debout($api->getErrorMessage());
} else {
    $captchaText = $api->getTaskSolution();
    echo "\nresult: $captchaText\n\n";
}
