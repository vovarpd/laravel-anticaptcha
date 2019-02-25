<?php

namespace LaravelAnticaptcha\Anticaptcha;

interface AntiCaptchaTaskProtocol {

    public function getPostData();

    public function getTaskSolution();

}
