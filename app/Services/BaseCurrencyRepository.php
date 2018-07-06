<?php

namespace App\Services;

use App\Services\Currency;

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

    public function findActive(): array
    {
        return array_values(
            array_filter(
                $this->currencies,
                function(Currency $item) {
                    return $item->isActive();
                }
            )
        );
    }

    public function delete(Currency $currency): void
    {
        unset($this->currencies[$currency->getId()]);
    }
}