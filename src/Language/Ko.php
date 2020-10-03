<?php

namespace HyungJu\Language;

class Ko
{
    use Language;

    private $langCode = 'ko';
    private $gluesForVowel = ['그'];
    private $gluesForNonVowel = ['그', '그'];
    private $vowels = ['a', 'e', 'i', 'o', 'u'];

    function isVowel(string $word)
    {
        return true;
    }
}