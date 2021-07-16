<?php

namespace Tests\Feature;

use App\Models\Thread;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ElasticTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function check()
    {
        config(['scout.driver' => 'Matchish\ScoutElasticSearch\Engines\ElasticSearchEngine']);

        Thread::factory()->create(['title' => 'hello']);
        Thread::factory()->create(['title' => 'hello']);

        dd(Thread::search('hello')->get()->toArray());
    }
}