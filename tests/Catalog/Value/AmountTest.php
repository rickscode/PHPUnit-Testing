<?php
declare(strict_types=1);

namespace App\Tests\Catalog\Value;

use App\Catalog\Exception\AmountBelowZero;
use App\Catalog\Value\Amount;
use PHPUnit\Framework\TestCase;

final class AmountTest extends TestCase
{
    public function testGetCents_WithValidCents_ReturnsUnchangedCents(): void
    {
        // Instantiate class and dependencies
        $amount = new Amount(1000);
        // method/unit to call
        $cents = $amount->getCents();
        // Expected behaviour 1st argument expected value, 2nd argument is actual value.
        self::assertEquals(1000, $cents);
    }

    public function testConstructor_WithNegativeCents_ThrowsException(): void
    {
        // intercept exception
        $this->expectException(AmountBelowZero::class);
        new Amount(-1);
    }
}
