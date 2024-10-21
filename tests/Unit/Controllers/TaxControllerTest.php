<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\TaxController;
use Tests\TestCase;

class TaxControllerTest extends TestCase
{
    private TaxController $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new TaxController();
    }

    public function testGetAllTaxBands()
    {
        $response = $this->controller->getAllTaxBands();

        $this->assertJson($response->getContent());
    }
}

