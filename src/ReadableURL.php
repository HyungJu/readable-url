<?php

namespace HyungJu;

/**
 * readable-url
 * Generate readable random phrases for URLs
 */
class ReadableURL
{
    private $capitalize;
    private $wordCount;
    private $separator;

    private $vowels;
    private $adjectives;
    private $nouns;

    /**
     * ReadableURL constructor.
     *
     * @param bool $capitalize If true, returns string in CamelCase, else lowercase. (default: true)
     * @param int $wordCount The number of words to be generated in the string. (Between 2 and 10). (default: 3)
     * @param string $separator The separator between the words. (default: '')
     * @throws \Exception
     */
    function __construct(bool $capitalize = true, int $wordCount = 3, string $separator = '')
    {
        if ($wordCount < 2) {
            throw new \Exception('Minimum value expected: 2');
        } else if ($wordCount > 10) {
            throw new \Exception('Maximum value expected: 10');
        }

        $this->capitalize = $capitalize;
        $this->wordCount = $wordCount;
        $this->separator = $separator;

        $this->vowels = ['a', 'e', 'i', 'o', 'u'];
        $this->adjectives = explode(" ", file_get_contents(__DIR__ . "/words/adjectives.txt"));
        $this->nouns = explode(" ", file_get_contents(__DIR__ . "/words/nouns.txt"));
    }

    /**
     * 생성 시 단어들의 대문자 변환을 위한 함수.
     *
     * @param $wordsList
     * @return mixed
     */
    private function convertToTitleCase($wordsList)
    {
        for ($i = 0; $i < count($wordsList); $i++) {
            $wordsList[$i] = strtoupper($wordsList[$i][0]) . strtolower(substr($wordsList[$i], 1));
        }

        return $wordsList;
    }

    /**
     * readable-url 을 생성합니다.
     *
     * @return string
     */
    public function generate()
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

        return implode($this->separator, $wordList);
    }

    /**
     * readable-url 을 생성합니다. (shortcut)
     *
     * @param bool $capitalize If true, returns string in CamelCase, else lowercase. (default: true)
     * @param int $wordCount The number of words to be generated in the string. (Between 2 and 10). (default: 3)
     * @param string $separator The separator between the words. (default: '')
     * @return string
     * @throws \Exception
     */
    public static function gen(bool $capitalize = true, int $wordCount = 3, string $separator = ''): string {
        $class = new ReadableURL($capitalize, $wordCount, $separator);
        return $class->generate();
    }
}
