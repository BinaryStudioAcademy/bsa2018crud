<?php

namespace App\Services;

interface CurrencyRepository
{
    // todo implement

    /**
     * @param Currency[]
     */
    public function __construct(array $currencies);

    public function findById(int $id);

    public function save(Currency $currency): void;
}