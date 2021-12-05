<?php

declare(strict_types=1);

/**
 * @param int $number The number of seconds, minutes, hours, days, weeks, months and years.
 * @param int $last_digit Last digit of the number, if number with 1 digit return it.
 *
 * @return bool[]|array[]
 */
return static function (int $number, int $last_digit): array {
    return [
        'single' => [
            $number === 1,
            $last_digit === 1 && $number >= 21,
        ],
        'plural' => [
            $number >= 2 && $number < 5,
            $number >= 22 && $last_digit >= 2 && $last_digit < 5,
        ],
        'special' => [
            $number >= 5 && $number <= 20,
            $last_digit === 0,
            $last_digit >= 5 && $last_digit <= 9,
        ],
    ];
};
