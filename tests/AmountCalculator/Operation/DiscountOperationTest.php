<?php

namespace App\Tests\AmountCalculator\Operation;

use App\AmountCalculator\Operation\DiscountOperation;
use App\Catalog\Value\Amount;
use App\Catalog\Value\Discount;
use Exception;
use PHPUnit\Framework\TestCase;

// Specify what the unit test should cover
/** @covers \App\AmountCalculator\Operation\DiscountOperation */
class DiscountOperationTest extends TestCase
{
    /** @test
     * @throws Exception
     */

    public function applyTo_WithMultipleDiscounts_ReturnsDiscountedAmount(): void
    {
        // Instantiate DiscountOperation class
        $operation = new DiscountOperation([
            // Multiple discounts
            Discount::fromAmount(10),
            Discount::fromAmount(10)
        ]);

        self::assertEquals(
            new Amount(80),
            $operation->applyTo(new Amount(100))
        );
    }

    /** @test
     * @throws Exception
     */

    public function applyTo_WithoutDiscounts_ReturnsOriginalAmount(): void
    {
        $operation = new DiscountOperation([]);

        self::assertEquals(
            new Amount(100),
            $operation->applyTo(new Amount(100))
        );
    }

    /** @test
     * @throws Exception
     */

    public function applyTo_WithDiscountGreaterThanAmount_ReturnsZero(): void
    {
        // Arrange, Act, Assert.
        $operation = new DiscountOperation([
            Discount::fromAmount(200)
        ]);

        self::assertEquals(
            // Expected outcome
            new Amount(0),
            // Discount 200 from 100
            $operation->applyTo(new Amount(100))
        );
    }

}