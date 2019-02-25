<?php

namespace LaravelAnticaptcha;

use Illuminate\Support\ServiceProvider;
use LaravelAnticaptcha\Anticaptcha\CustomCaptcha;
use LaravelAnticaptcha\Anticaptcha\FunCaptcha;
use LaravelAnticaptcha\Anticaptcha\FunCaptchaProxyless;
use LaravelAnticaptcha\Anticaptcha\GeeTest;
use LaravelAnticaptcha\Anticaptcha\GeeTestProxyless;
use LaravelAnticaptcha\Anticaptcha\ImageToText;
use LaravelAnticaptcha\Anticaptcha\NoCaptcha;
use LaravelAnticaptcha\Anticaptcha\NoCaptchaProxyless;

class AnticaptchaServiceProvider extends ServiceProvider {
    public $defer = true;

    public function boot() {
        $this->publishes([
            __DIR__.'/../config/anticaptcha.php' => config_path('anticaptcha.php'),
        ], 'anticaptcha');

        $this->mergeConfigFrom(
            __DIR__.'/../config/anticaptcha.php',
            'anticaptcha'
        );

    }

    public function register() {

        $this->app->singleton(NoCaptchaProxyless::class, function($app) {
            $instance = new NoCaptchaProxyless();
            $instance->setKey(config('anticaptcha.key'));

            return $instance;
        } );

        $this->app->singleton(NoCaptcha::class, function($app) {
            $instance = new NoCaptcha();
            $instance->setKey(config('anticaptcha.key'));

            return $instance;
        } );

        $this->app->singleton(ImageToText::class, function($app) {
            $instance = new ImageToText();
            $instance->setKey(config('anticaptcha.key'));

            return $instance;
        } );

        $this->app->singleton(GeeTestProxyless::class, function($app) {
            $instance = new GeeTestProxyless();
            $instance->setKey(config('anticaptcha.key'));

            return $instance;
        } );

        $this->app->singleton(GeeTest::class, function($app) {
            $instance = new GeeTest();
            $instance->setKey(config('anticaptcha.key'));

            return $instance;
        } );

        $this->app->singleton(FunCaptchaProxyless::class, function($app) {
            $instance = new FunCaptchaProxyless();
            $instance->setKey(config('anticaptcha.key'));

            return $instance;
        } );

        $this->app->singleton(FunCaptcha::class, function($app) {
            $instance = new FunCaptcha();
            $instance->setKey(config('anticaptcha.key'));

            return $instance;
        } );

        $this->app->singleton(CustomCaptcha::class, function($app) {
            $instance = new CustomCaptcha();
            $instance->setKey(config('anticaptcha.key'));

            return $instance;
        } );

    }

    public function provides() {
        return [
            NoCaptchaProxyless::class,
            NoCaptcha::class,
            ImageToText::class,
            GeeTestProxyless::class,
            GeeTest::class,
            FunCaptchaProxyless::class,
            FunCaptcha::class,
            CustomCaptcha::class
        ];
    }

}
