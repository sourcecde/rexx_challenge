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

    public function testTimezoneconvertTest()
    {
        $givenDate = '2019-12-21 18:46:32';
        $expectedDate = '2019-12-21 19:46:32';

        $this->assertEquals($expectedDate, $this->shopsController->timeConverter($givenDate));
    }
}
