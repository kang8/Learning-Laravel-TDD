<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewQuestionsTest extends TestCase
{
    /**
     * @test
     */
    public function user_can_view_questions()
    {
        // 0. throw exception
        $this->withoutExceptionHandling();

        // 1. assume route `/questions` exites
        // 2. access GET /questions
        $test = $this->get('/questions');

        // 3. response 200
        $test->assertStatus(200);
    }
}
