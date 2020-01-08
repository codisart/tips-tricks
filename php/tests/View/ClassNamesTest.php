<?php

namespace TipsTricks\View;

use PHPUnit\Framework\TestCase;

class ClassNamesTest extends TestCase
{
    public function providerClassNames()
    {
        return [
            ['solid large', ['solid' => true, 'red' => false, 'large' => true]],
            ['solid large', 'solid', 'large'],
            ['solid large', 'solid', ['large' => true]],
            ['solid large', ['solid' => true], ['large' => true]],
        ];
    }

    /**
     * @dataProvider providerClassNames
     */
    public function testClassNames($expected, ...$params)
    {
        $result = ClassNames::from(...$params);

        self::assertSame($expected, (string) $result);
    }
}