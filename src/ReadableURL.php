<?php

namespace HyungJu;

use HyungJu\Language\LanguageHelper;

/**
 * readable-url
 * Generate readable random phrases for URLs
 */
class ReadableURL
{
    private $capitalize;
    private $wordCount;
    private $separator;


    private $language;

    /**
     * ReadableURL constructor.
     *
     * @param bool $capitalize If true, returns string in CamelCase, else lowercase. (default: true)
     * @param int $wordCount The number of words to be generated in the string. (Between 2 and 10). (default: 3)
     * @param string $separator The separator between the words. (default: '')
     * @param string $language Language Setting (default: 'en')
     * @throws \UnexpectedValueException
     */
    function __construct(bool $capitalize = true, int $wordCount = 3, string $separator = '', string $language = 'en')
    {
        if ($wordCount < 2) {
            throw new \UnexpectedValueException('Minimum value expected: 2');
        } else if ($wordCount > 10) {
            throw new \UnexpectedValueException('Maximum value expected: 10');
        }

        $this->capitalize = $capitalize;
        $this->wordCount = $wordCount;
        $this->separator = $separator;

        $this->language = LanguageHelper::getLanguage($language);

    }

    /**
     * 생성 시 단어들의 대문자 변환을 위한 함수.
     *
     * @param $wordsList
     * @return mixed
     */
    private static function convertToTitleCase(array $wordsList)
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

        array_push($wordList, $this->language->pickOneAdjective());
        array_push($wordList, $this->language->pickOneNoun());

        if ($this->wordCount > 5) {
            array_map(function ($e) {
                array_unshift($wordList, $e);
            }, $this->language->pickMultipleAdjectives($this->wordCount - 1));
        } else {
            if ($this->wordCount > 2) {
                array_unshift($wordList, $this->language->pickOneAdjective());
            }
            if ($this->wordCount > 3) {
                array_unshift($wordList, $this->language->pickOneGlueFor($wordList[0]));
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
    public static function gen(bool $capitalize = true, int $wordCount = 3, string $separator = ''): string
    {
        $class = new ReadableURL($capitalize, $wordCount, $separator);
        return $class->generate();
    }

}
