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



    /** @test */
    public function guests_may_not_view_projects()
    {
        $this->get('/storage')->assertRedirect('login');
    }

    /** @test */
    public function a_guest_cannot_create_recipes()
    {
        $this->post('/recipes')->assertRedirect('login');
    }

    /** @test */
    public function an_authenticated_user_can_create_projects()
    {

        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

        $attributes = [
            'image' => 'https://www.edamam.com/web-img/9ce/9ceb6392ae7f8a76979b87e5645559e3.jpg',
            'title' => 'Pizza Bianco',
            'ingredients' => ['olive oil, 1 sliced SPanish onion, sliced'],
            'diet_label' => ['balanced'],
            'calories' => 1805
        ];

        $this->post('/recipes', $attributes);

        $this->assertDatabaseHas('recipes', [
            'image' => $attributes['image'],
            'title' => $attributes['title'],
            'ingredients' => json_encode($attributes['ingredients']),
            'diet_label' => json_encode($attributes['diet_label']),
            'calories' => $attributes['calories']
        ]);
    }
}
