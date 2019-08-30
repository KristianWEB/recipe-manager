<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Recipe;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function when_the_guest_registers_a_record_in_the_user_db_will_be_made()
    {
        $user = factory('App\User')->create();

        $this->assertDatabaseHas('users', [
            'name' => $user->name,
        ]);
    }


    /** @test */
    public function recipes_belong_to_an_owner()
    {

        $owner = factory(User::class)->create();

        $recipe = factory(Recipe::class)->create(['title' => 'Chocolate']);

        $this->assertInstanceOf('App\User', $recipe->owner);
    }


    // this doesnt work

    // we need a way of checking if the user is authenticated, if he is then we persist the data into the database. if not then we redirect him to /login or show the modal on the same page and not persist it in the database

    /** @test */
    public function a_guest_cannot_create_recipes()
    {
        $recipe = factory(Recipe::class)->create(['title' => 'Pizza Dough']);

        $this->post('/recipes')->assertRedirect('login');

        $this->assertDatabaseMissing('recipes', [
            'title' => $recipe->title,
            'user_id' => $recipe->owner->id
        ]);
    }

    // this is simply wrong you don't need to be redirected to / route. you have to stay on the same page. 
    /** @test */
    public function an_authenticated_user_can_create_projects()
    {
        $owner = factory(User::class)->create();

        $this->actingAs($owner);

        $recipes = factory(Recipe::class, 2)->create(['title' => 'Pizza Dough', 'user_id' => 1]);

        $this->post('/recipes')->assertRedirect('/');

        $this->assertDatabaseHas('recipes', [
            'title' => $recipes[0]->title,
            'user_id' => $owner->id
        ]);
    }

    // a guest should not be able to create recipes
}
