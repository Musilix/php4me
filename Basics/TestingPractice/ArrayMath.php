<?php

// Think of the use of this namespace as an object
// The class defined here will be put within the App namespace/object
namespace App;

class ArrayMath {
  public static function doMath(string $type, int|float ...$values): int|float {
    $mathAction = match ($type) {
      "add" => function () use ($values): int|float {
        return array_sum($values);
      },
      "subtract" => function () use ($values): int|float {
        return array_reduce($values, function ($carry, $item) {
          return $carry - $item;
        });
      },
      "multiply" => function () use ($values): int|float {
        return array_product($values);
      }
    };

    return call_user_func($mathAction);
  }
}
