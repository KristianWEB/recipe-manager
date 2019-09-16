<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StorageTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * 
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function an_authenticated_user_will_save_a_recipe_to_their_storage_when_clicking_save_on_a_recipe()
    {
        $this->be(factory('App\User')->create());

        $recipe = factory('App\Recipe')->create(['user_id' => auth()->id()]);

        $this->get('storage')->assertSee($recipe->title);
    }
}
