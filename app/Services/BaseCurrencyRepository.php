<?php

namespace App\Services;

class BaseCurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    public function __construct(array $currencies = [])
    {
        foreach ($currencies as $currency) {
            $this->currencies[$currency->getId()] = $currency;   
        }        
    }

    /**
     * @return Currency[]
     */
    public function findAll(): array
    {
        return array_values($this->currencies);
    }

    public function findById(int $id): ?Currency
    {
        return $this->currencies[$id] ?? null;
    }

    public function save(Currency $currency): void
    {
        $this->currencies[$currency->getId()] = $currency;
    }
}