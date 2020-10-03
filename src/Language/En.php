<?php

namespace HyungJu\Language;

class En
{
    use Language;

    private $langCode = 'en';
    private $gluesForVowel = ['an'];
    private $gluesForNonVowel = ['a', 'the'];
    private $vowels = ['a', 'e', 'i', 'o', 'u'];

    function isVowel(string $word)
    {
        $isVowel = false;

        for ($i = 0; $i < 5; $i++) {
            if ($this->vowels[$i] === $word[0]) {
                $isVowel = true;
                break;
            }
        }

        return $isVowel;
    }
}