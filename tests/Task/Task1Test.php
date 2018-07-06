<?php

namespace Tests\Task;

use App\Services\Currency;
use App\Services\CurrencyRepositoryInterface;
use Tests\TestCase;

/**
 * Tests Task1
 */
class Task1Test extends TestCase
{
    const ENDPOINT = '/api/currencies';

    public function test_currency_entity()
    {
        $date = new \DateTime();

        $currency = new Currency(
            1,
            'bitcoin',
            'btc',
            1000,
            $date,
            true
        );

        $this->assertEquals(1, $currency->getId());
        $this->assertEquals('crypto', $currency->getName());
        $this->assertEquals('btc', $currency->getShortName());
        $this->assertEquals(1000, $currency->getActualCourse());
        $this->assertEquals($date, $currency->getActualCourseDate());
        $this->assertEquals(true, $currency->isActive());
    }

    public function test_currency_repository_registered()
    {
        $this->assertInstanceOf(
            CurrencyRepositoryInterface::class,
            $this->app->make(
                CurrencyRepositoryInterface::class
            )
        );
    }

    public function test_currency_repository_find_all()
    {
        $repository = $this->app->make(CurrencyRepositoryInterface::class);

        $currencies = $repository->findAll();

        $this->assertNotEmpty($currencies);
        $this->assertCurrenciesData($currencies);

    }

    public function test_currency_repository_find_by_id()
    {
        $repository = $this->app->make(CurrencyRepositoryInterface::class);

        $currency = $repository->findById(1);

        $this->assertEquals(1, $currency->getId());
    }

    public function test_currency_repository_save()
    {
        $repository = $this->app->make(CurrencyRepositoryInterface::class);

        $currency = new Currency(
            1,
            'bitcoin',
            'btc',
            1000,
            new \DateTime(),
            true
        );

        $repository->save($currency);

        $currency = $repository->findById(1);

        $this->assertEquals(1, $currency->getId());
    }

    public function test_currency_repository_save_duplicate_not_allowed()
    {
        $repository = $this->app->make(CurrencyRepositoryInterface::class);

        $currency = new Currency(
            1,
            'bitcoin',
            'btc',
            1000,
            new \DateTime(),
            true
        );

        $repository->save($currency);

        $this->expectException(\LogicException::class);

        $repository->save($currency);
    }

    private function assertCurrenciesData(array $currencies): void
    {
        foreach ($currencies as $currency) {
            $this->assertInstanceOf(Currency::class, $currency);
            $this->assertNotEmpty($currency->getId());
            $this->assertNotEmpty($currency->getName());
            $this->assertNotEmpty($currency->getShortName());
            $this->assertNotEmpty($currency->getActualCourse());
            $this->assertNotEmpty($currency->getActualCourseDate());
            $this->assertNotEmpty($currency->isActive());
        }
    }

//    public function testStatus()
//    {
//        $response =  $this->json('GET', self::ENDPOINT);
//        $response->assertStatus(200);
//    }
//
//    public function testHeader()
//    {
//        $response =  $this->json('GET', self::ENDPOINT);
//        $response->assertHeader('Content-Type', 'application/json');
//    }
//
//    public function testStructure()
//    {
//        $response =  $this->json('GET', self::ENDPOINT);
//        $response->assertJsonStructure([
//            [
//                'id',
//                'name',
//                'short_name',
//                'actual_course',
//                'actual_course_date'
//            ]
//        ]);
//    }
//
//    public function testUnecessaryRoutes()
//    {
//        $response =  $this->json('POST', self::ENDPOINT);
//        $response->assertStatus(405);
//
//        $response =  $this->json('DELETE', self::ENDPOINT);
//        $response->assertStatus(405);
//
//        $response =  $this->json('PATCH', self::ENDPOINT);
//        $response->assertStatus(405);
//
//        $response =  $this->json('PUT', self::ENDPOINT);
//        $response->assertStatus(405);
//    }
}