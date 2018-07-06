<?php

namespace App\Services;

use App\Services\Currency;
use Carbon\Carbon;

class CurrencyPresenter
{
    public static function present(Currency $currency): array
    {
        return [
            'id' => $currency->getId(),
            'name' => $currency->getName(),
            'short_name' => $currency->getShortName(),
            'actual_course' => $currency->getActualCourse(),
            'actual_course_date' => Carbon::instance($currency->getActualCourseDate())
                ->format('Y-m-d H-i-s'),
            'active' => $currency->isActive()
        ];
    }

    public static function presentCollection(array $data): array
    {
        $items = [];

        foreach ($data as $datum) {
            $items[] = self::present($datum);
        }

        return $items;        
    }
}