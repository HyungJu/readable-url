<?php


namespace HyungJu\lang;


use HyungJu\lang\en\En;

class LanguageHelper
{
    private static $lang = [
        "en" => En::class,
        "words" => Ko::class
    ];

    private static $defaultLang = 'en';

    static function getLanguage($code)
    {
        if (!array_key_exists($code, self::$lang)) {
            $code = self::$defaultLang;
        }

        $ref = new \ReflectionClass(self::$lang[$code]);
        return $ref->newInstance();
    }
}