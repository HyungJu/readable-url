<?php


namespace HyungJu\Tests\Language;

use HyungJu\Language\En;
use HyungJu\Language\Ko;
use PHPUnit\Framework\TestCase;


class ENTest extends TestCase
{
    public function testEnglishVowel()
    {
        $en = new En();
        $this->assertTrue($en->isVowel("apple"));
        $this->assertTrue($en->isVowel("elephant"));
        $this->assertTrue($en->isVowel("internet"));
        $this->assertTrue($en->isVowel("orange"));
        $this->assertTrue($en->isVowel("unittest"));
        $this->assertFalse($en->isVowel("php"));
    }
}
