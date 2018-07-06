<?php

namespace App\Services;

interface CurrencyRepositoryInterface
{
    // todo implement

    /**
     * @return Currency[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Currency|null
     */
    public function findById(int $id): ?Currency;

    public function save(Currency $currency): void;
}