<?php

namespace Tests\Feature;

use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewQuestionsTest extends TestCase
{
    use RefreshDatabase;

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

    /**
     * @test
     */
    public function user_can_view_a_single_question() {
        // 1. create a question
        $question = Question::factory()->create();

        // 2. access URL
        $test = $this->get('/questions/' . $question->id);

        // 3. response question body
        $test->assertStatus(200)
             ->assertSee($question->title)
             ->assertSee($question->content);
    }
}
