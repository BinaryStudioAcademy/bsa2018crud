<?php

namespace App\Services;

class Currency
{
    // todo implement methods for update/get currency data

    public function __construct(
        int $id,
        string $name,
        string $shortName,
        float $actualCourse,
        \DateTime $actualCourseDate,
        bool $isActive
    ) {
    }
}