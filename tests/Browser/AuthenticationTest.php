<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class AuthenticationTest extends DuskTestCase
{

    use DatabaseMigrations;
    public function setUp(): void
    {
        parent::setUp();
        factory('App\User')->create();
    }

    /** @test */
    public function  a_guest_will_see_a_sign_in_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://recipemanager.test/recipes')
                ->assertSee('LOGIN');
        });
    }

    /** @test */
    public function  an_authenticated_user_will_see_a_home_button()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('http://recipemanager.test/recipes')
                ->assertSee('Home');
        });
    }
}
