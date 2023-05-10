<?php

declare(strict_types=1);

namespace Test\Unit;

use App\ArrayMath;
use PHPUnit\Framework\TestCase;

class ArrayMathTest extends TestCase {
  // define methods to test
  function test_that_it_sums_int_array(): void {
    // Follow the given when then pattern
    // given that we have an int array and Math object
    $int_array = [1, 2, 3, 4, 5];

    // when we call the doMath method on the Math object, with the "add" type and the int array
    $sum = ArrayMath::doMath("add", ...$int_array);
    $expected = 15;

    // then it should return the proper sum of all the elements in the int array
    $this->assertEquals($expected, $sum);
  }
}
