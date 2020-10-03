<?php

namespace HyungJu\Language;

trait Language
{
    abstract function isVowel(string $word);

    public function getLangCode(): string
    {
        return $this->langCode;
    }

    public function pickOneAdjective(): string
    {
        $adjectives = explode(" ", file_get_contents(__DIR__ . "/../words/" . $this->langCode . "/adjectives.txt"));
        return $adjectives[rand(0, count($adjectives) - 1)];
    }

    public function pickOneNoun(): string
    {
        $nouns = explode(" ", file_get_contents(__DIR__ . "/../words/" . $this->langCode . "/nouns.txt"));
        return $nouns[rand(0, count($nouns) - 1)];
    }

    public function pickOneGlueForVowel(): string
    {
        return $this->gluesForVowel[rand(0, count($this->gluesForVowel) - 1)];
    }

    public function pickOneGlueForNonVowel(): string
    {
        return $this->gluesForNonVowel[rand(0, count($this->gluesForNonVowel) - 1)];
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