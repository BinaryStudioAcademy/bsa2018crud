<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CurrencyRepositoryInterface;
use App\Services\CurrencyPresenter;

class CurrencyController extends Controller
{
    private $repository;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getCurrencies()
    {
        return response()->json(
            CurrencyPresenter::presentCollection($this->repository->findAll())
        );
    }

    public function getCurrency(string $id)
    {
        $currency = $this->repository->findById($id);

        if (! $currency) {
            return response()->json([], 404);    
        }

        return response()->json(CurrencyPresenter::present($currency));
    }
}
