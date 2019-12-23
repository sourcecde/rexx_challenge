<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DateRangeController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopsControllerTest extends TestCase
{
    protected $shopsController;

    protected function setUp(): void
    {
        $this->shopsController = new ShopsController();
    }

    protected function tearDown(): void
    {
        $this->shopsController = NULL;
    }

    /**
     * A basic test example.
     *
     * @return void
     */

    public function testTimezoneconvert()
    {
        $givenDate = '2019-12-21 18:46:32';
        $expectedDate = '2019-12-21 19:46:32';

        $this->assertEquals($expectedDate, $this->shopsController->timeConverter($givenDate),"given date is not equals to expected date");
    }

    public function testVerionCompareToCalculateSaleDate()
    {
        $givenDate = '2019-12-21 18:46:32';
        $expectedDate = '2019-12-21 19:46:32';
        $version = '1.0.17+05';

        $this->assertEquals($expectedDate, $this->shopsController->versionCompare($version,$givenDate),"given date is not equals to expected date");
    }
}
