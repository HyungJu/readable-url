<?php

namespace HyungJu\Language;

class Ko extends Language
{

    function getLangCode()
    {
        return 'ko';
    }

    function getGluesForVowel()
    {
        return ['그'];
    }

    function getGluesForNonVowel()
    {
        return ['그'];
    }

    function getVowels()
    {
        return [];
    }

    function isVowel(string $word)
    {
        return true;
    }
}