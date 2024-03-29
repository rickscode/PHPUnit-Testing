<?php
declare(strict_types=1);

namespace App\Tests\AmountCalculator\Operation;

use App\AmountCalculator\Operation\MarkupOperation;
use App\Catalog\Value\Amount;
use PHPUnit\Framework\TestCase;

final class MarkupOperationTest extends TestCase
{
    /** @test */
    public function applyTo_WithMarkup_AddsPercentMarkup(): void
    {
        // Instantiate class (test constructor or dependencies)
        $operation = new MarkupOperation(.25);
        // Call class method and pass Amount class as parameter
        $amount = $operation->applyTo(new Amount(100));
        // Expected result of $amount
        self:self::assertEquals(new Amount(125), $amount);
    }

    /**
     * @test
     * @dataProvider getInvalidMarkupValues
     * @param $markup
     */
    public function constructor_WithInvalidMarkupValues($markup): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new MarkupOperation($markup);
    }


    // Data provider
    public function getInvalidMarkupValues()
    {
        return [
            'int' => [1],
            'string' => ['0.25'],
            'boolean' => [true],
            'array' => [[]],
            'null' => [null],
            'object' => [new \stdClass()]
        ];
    }
}
