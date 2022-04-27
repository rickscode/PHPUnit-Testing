<?php
namespace App\Tests\Catalog\Value;

use App\Catalog\Value\Amount;
use App\Catalog\Value\Discount;
use PHPUnit\Framework\TestCase;

/** @covers  App\Catalog\Value\Discount */
class DiscountTest extends TestCase
{
    /** @test */

    // Amount value varies with price
    public function getDiscountAmountForPrice_WithPercent_ReturnsPercentOfPRice(): void
    {
        $discount = Discount::fromPercent(0.20);
        self::assertEquals(
            // Value of discount 20% of 100 cents
            new Amount(20),
            $discount->getDiscountAmountForPrice(new Amount(100))
        );
    }

    /** @test */

    // Amount value does not vary with price
    public function getDiscountAmountForPrice_WithAmount_ReturnsSameAmount(): void
    {
        $discount = Discount::fromAmount(10);
        self::assertEquals(
            new Amount(10),
            // Should return 10 no matter the price
            $discount->getDiscountAmountForPrice(new Amount(10000))
        );
    }
}