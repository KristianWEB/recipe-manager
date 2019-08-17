<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipesTest extends TestCase
{
    // given that I am an authenticated user, I should be able to have as many recipes I want saved in my STORAGE ( Relation One to Many )
    /** @test */
    public function a_user_has_many_recipes()
    { }
}
