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

    // given that I am a guest, I should see a sign in button to login into the application 
    /** @test */
    public function a_guest_will_see_a_sign_in_button_to_login()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('http://recipemanager.test/recipes')
                ->assertSee('SIGN IN');
        });
    }

    // given that I am an authenticated user, I should see an account button 
    /** @test */
    public function an_authenticated_user_will_see_an_account_button()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('/recipes')
                ->assertSee('Account');
        });
    }
    // given that I am a guest, when I get to STORAGE page I should be prompted to SIGN IN before continuing.

    // given that I am an authenticated user I should be able to get to STORAGE page and If I don't have recipes saved, I should be prompted to RECIPES page to save some


    // given that I am a guest, if I try to save a recipe I should be prompted to SIGN IN before continuing.

}
