<?php

namespace Tests\Feature;

use App\BigQuestion;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('東京の難読地名クイズ');

        $aaa = factory(BigQuestion::class)->create([
            'name' => '広島の難読地名クイズ'
        ]);

        $response->assertSee($aaa->name);

        $this->assertDatabaseHas('big_questions', [
            'name' => '広島の難読地名クイズ'
        ]);
        
    }
}
