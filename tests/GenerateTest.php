<?php

namespace HyungJu\Tests;

use HyungJu\ReadableURL;
use PHPUnit\Framework\TestCase;

class GenerateTest extends TestCase
{
    private $readableUrl;

    public function setUp(): void
    {
        $this->readableUrl = new ReadableURL();
    }

    public function testConvertToTitleCase()
    {
        $converted = $this->readableUrl->convertToTitleCase(['the', 'quick', 'brown', 'fox', 'jumps', 'over', 'a', 'lazy', 'dog']);
        $this->assertSame(['The', 'Quick', 'Brown', 'Fox', 'Jumps', 'Over', 'A', 'Lazy', 'Dog'], $converted);
    }
}