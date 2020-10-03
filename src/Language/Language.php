<?php

namespace HyungJu\Language;

abstract class Language
{
    abstract function isVowel(string $word);

    abstract function getLangCode();
    abstract function getGluesForVowel();
    abstract function getGluesForNonVowel();
    abstract function getVowels();

    public function pickOneAdjective(): string
    {
        $adjectives = explode(" ", file_get_contents(__DIR__ . "/../words/" . $this->getLangCode() . "/adjectives.txt"));
        return $adjectives[rand(0, count($adjectives) - 1)];
    }

    public function pickOneNoun(): string
    {
        $nouns = explode(" ", file_get_contents(__DIR__ . "/../words/" . $this->getLangCode() . "/nouns.txt"));
        return $nouns[rand(0, count($nouns) - 1)];
    }

    public function pickOneGlueForVowel(): string
    {
        $gluesForVowel = $this->getGluesForVowel();
        return $gluesForVowel[rand(0, count($gluesForVowel) - 1)];
    }

    public function pickOneGlueForNonVowel(): string
    {
        $gluesForNonVowel = $this->getGluesForNonVowel();
        return $gluesForNonVowel[rand(0, count($gluesForNonVowel) - 1)];
    }

    public function pickOneGlueFor(string $word): string
    {
        if ($this->isVowel($word)) {
            return $this->pickOneGlueForVowel();
        } else {
            return $this->pickOneGlueForNonVowel();
        }
    }

    public function pickMultipleAdjectives(int $numbers): array
    {
        $res = [];
        for ($i = 0; $i < $numbers; $i++) {
            $res[] = $this->pickOneAdjective();
        }

        return $res;
    }

    public function pickMultipleNouns(int $numbers): array
    {
        $res = [];
        for ($i = 0; $i < $numbers; $i++) {
            $res[] = $this->pickOneAdjective();
        }

        return $res;
    }


}