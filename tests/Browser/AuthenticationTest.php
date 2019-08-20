<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class AuthenticationTest extends DuskTestCase
{

    use DatabaseMigrations;

    /** @test */
    public function a_guest_will_see_a_sign_in_button_to_login()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('http://recipemanager.test/recipes')
                ->assertSee('SIGN IN');
        });
    }


    /** @test */
    public function an_authenticated_user_will_see_an_account_button()
    {
        factory('App\User')->create();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('/recipes')
                ->assertSee('Account');
        });
    }


    /** @test */
    public function a_guest_will_be_prompted_to_login_before_accessing_storage()
    {

        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/recipes')
                ->waitForText('Save')
                ->press('Save')
                ->waitForText('Login')
                ->assertSee('Login');
        });
    }

    /** @test */
    public function if_login_is_successful_user_will_be_prompted_to_storage()
    {

        factory('App\User')->create();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('/recipes')
                ->waitForText('Save')
                ->press('Save')
                ->waitForLocation('/storage')
                ->assertSee('this is the storage page.');
        });
    }

    /** @test */
    public function if_login_is_unsuccessful_errors_will_be_shown_under_form_inputs_using_AJAX()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/recipes')
                ->waitForText('Save')
                ->press('Save')
                ->waitForText('Login')
                ->type('email', 'kristian@kristian.com')
                ->type('password', 'asdfasdf')
                ->press('Login')
                ->pause(1000)
                ->assertSee('These credentials do not match our records.');
        });
    }

    public function an_authenticated_user_with_no_recipes_will_be_prompted_to_recipes_when_accessing_storage()
    { }
}
