<?php
declare(strict_types=1);

namespace amcsi\playground\test;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Class05.php';

final class Class05Test extends TestCase
{
    /**
     * @dataProvider provideTest1
     */
    public function test1(): void
    {

    }

    public function provideTest1()
    {
        return [
            [],
        ];
    }

    /**
     * @dataProvider provideTest2
     */
    public function test2(): void
    {

    }

    public function provideTest2()
    {
        return [
            [],
        ];
    }
}
