<?php


namespace HyungJu\Language;


class LanguageHelper
{
    private static $lang = [
        "en" => En::class,
        "ko" => Ko::class
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