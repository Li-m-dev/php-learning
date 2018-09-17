<?php

namespace Tests\Unit;

use App\Posts;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // $this->assertTrue(true);
        $first = factory(Posts::class)->create();

        $second = factory(Posts::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);


        $posts = Posts::archives();
           

            $this->assertEquals([
                [
                    "year" => $first->created_at->format('Y'),
                    "month" => $first->created_at->format('F'),
                    "published" => 1
                ],

                [
                    "year" => $second->created_at->format('Y'),
                    "month" => $second->created_at->format('F'),
                    "published" => 1
                ]
                ], $posts);
    }
}
