<?php

namespace App\Services;

class BaseCurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    public function __construct(array $currencies = [])
    {
        $this->currencies = $currencies;
    }

    /**
     * @return Currency[]
     */
    public function findAll(): array
    {
        return $this->currencies;
    }

    public function findById(int $id): ?Currency
    {
        return $this->currencies[$id] ?? null;
    }

    public function save(Currency $currency): void
    {
        if ($this->findById($currency->getId())) {
            throw new \LogicException('Id exists');
        }

        $this->currencies[$currency->getId()] = $currency;
    }
}