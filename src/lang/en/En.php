<?php

namespace HyungJu\lang\en;

use HyungJu\lang\Language;

class En extends Language
{

    function getLangCode()
    {
        return 'en';
    }

    function getGluesForVowel()
    {
        return ['a', 'the'];
    }

    function getGluesForNonVowel()
    {
        return ['an'];
    }

    function getVowels()
    {
        return ['a', 'e', 'i', 'o', 'u'];
    }

    function isVowel(string $word)
    {
        $isVowel = false;

        for ($i = 0; $i < 5; $i++) {
            if ($this->getVowels()[$i] === $word[0]) {
                $isVowel = true;
                break;
            }
        }

        return $isVowel;
    }
}