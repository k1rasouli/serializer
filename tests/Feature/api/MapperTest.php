<?php

namespace Tests\Feature\api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MapperTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_mapper_api_works_based_on_sample_data()
    {
        $response = $this->get('/api');
        $response->assertStatus(200);
        $this->assertEquals(6, count(json_decode($response->getContent())));
    }
}
