<?php

namespace HyungJu;

class ReadableURL
{

    private $capitalize;
    private $wordCount;
    private $seperator;

    private $vowels;
    private $adjectives;
    private $nouns;

    function __construct(bool $capitalize = true, int $wordCount = 3, string $seperator = '')
    {
        if ($wordCount < 2) {
            throw new \Exception('Minimum value expected: 2');
        } else if ($wordCount > 10) {
            throw new \Exception('Maximum value expected: 10');
        }

        $this->capitalize = $capitalize;
        $this->wordCount = $wordCount;
        $this->seperator = $seperator;

        $this->vowels = ['a', 'e', 'i', 'o', 'u'];
        $this->adjectives = explode(" ", file_get_contents(__DIR__ . "/words/adjectives.txt"));
        $this->nouns = explode(" ", file_get_contents(__DIR__ . "/words/nouns.txt"));
    }

    function convertToTitleCase($wordsList)
    {
        for ($i = 0; $i < count($wordsList); $i++) {
            $wordsList[$i] = strtoupper($wordsList[$i][0]) . strtolower(substr($wordsList[$i], 1));
        }

        return $wordsList;
    }

    function generate()
    {
        $wordList = [];

        array_push($wordList, $this->adjectives[rand(0, count($this->adjectives) - 1)]);
        array_push($wordList, $this->nouns[rand(0, count($this->nouns) - 1)]);

        if ($this->wordCount > 5) {
            for ($i = 0; $i < $this->wordCount - 2; $i++) {
                array_unshift($wordList, $this->adjectives[rand(0, count($this->adjectives) - 1)]);
            }
        } else {
            if ($this->wordCount > 2) {
                array_unshift($wordList, $this->adjectives[rand(0, count($this->adjectives) - 1)]);
            }
            if ($this->wordCount > 3) {
                $isVowel = false;
                $firstLetter = $wordList[0][0];

                for ($i = 0; $i < 5; $i++) {
                    if ($this->vowels[$i] === $firstLetter) {
                        $isVowel = true;
                        break;
                    }
                }

                if ($isVowel) {
                    array_unshift($wordList, 'an');
                } else {
                    array_unshift($wordList, rand(0, 1) ? 'a' : 'the');
                }
            }
        }

        if ($this->capitalize) {
            $wordList = $this->convertToTitleCase($wordList);
        }

        return implode($this->seperator, $wordList);
    }
}
