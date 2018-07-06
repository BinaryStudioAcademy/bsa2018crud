<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CurrencyPresenter;
use App\Services\Currency;
use App\Services\CurrencyRepositoryInterface;
use Carbon\Carbon;

class AdminController extends Controller
{
    private $repository;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return response()->json(
            CurrencyPresenter::presentCollection($this->repository->findAll())
        );
    }

    public function store(Request $request)
    {
        $storeData = $request->all();
        
        $currency = new Currency(
            999,
            $storeData['name'],
            $storeData['short_name'],
            $storeData['actual_course'],
            Carbon::createFromFormat('Y-m-d H-i-s', $storeData['actual_course_date']),
            $storeData['active']
        );
        
        $this->repository->save($currency);

        return response()->json(CurrencyPresenter::present($currency));
    }

    public function show($id)
    {
        $currency = $this->repository->findById($id);

        if (! $currency) {
            return response()->json([], 404);    
        }

        return response()->json(CurrencyPresenter::present($currency));
    }

    public function update(Request $request, $id)
    {
        $currency = $this->repository->findById($id);

        if (! $currency) {
            return response()->json([], 404);    
        }

        $storeData = $request->all();

        $currency->setActualCourse($storeData['actual_course']);
        $currency->setActualCourseDate(
            Carbon::createFromFormat('Y-m-d H-i-s', $storeData['actual_course_date'])
        );
        
        $this->repository->save($currency);

        return response()->json(CurrencyPresenter::present($currency));
    }

    public function destroy($id)
    {
        $currency = $this->repository->findById($id);

        if (! $currency) {
            return response()->json([], 404);    
        }
        
        $this->repository->delete($currency);

        return response()->json();
    }
}
