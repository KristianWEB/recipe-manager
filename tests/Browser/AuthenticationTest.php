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
    public function when_an_authenticated_user_clicks_on_storage_it_should_redirect_to_storage()
    {
        factory('App\User')->create();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('/recipes')
                ->clickLink('STORAGE')
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

    /** @test */
    public function if_a_guest_clicks_register_button_on_login_modal_a_new_register_modal_will_replace_the_old_one()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/recipes')
                ->waitForText('Save')
                ->press('Save')
                ->waitForText('Login')
                ->press('Register')
                ->pause(2000)
                ->assertSee('Register');
        });
    }

    /** @test */
    public function if_a_guest_registers_using_the_register_form_he_should_be_logged_in_after_and_redirected_to_the_same_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/recipes')
                ->press('SIGN IN')
                ->waitForText('Login')
                ->press('Don\'t have an account? Register')
                ->pause(2000)
                ->type('name', 'john')
                ->type('email', 'john@john.com')
                ->type('password', 'fkfkfkfk')
                ->type('password_confirmation', 'fkfkfkfk')
                ->press('Register')
                ->pause(2000)
                ->assertPathIs('/account')
                ->assertSee('account page.');
        });
    }

    /** @test */
    public function if_a_guest_tries_to_enter_an_email_that_is_already_taken_an_error_message_will_be_shown()
    {

        factory('App\User')->create([
            'email' => 'kristian@kristian.com'
        ]);

        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/recipes')
                ->press('SIGN IN')
                ->waitForText('Login')
                ->press('Don\'t have an account? Register')
                ->pause(2000)
                ->type('name', 'kristian')
                ->type('email', 'kristian@kristian.com')
                ->type('password', 'fkfkfkfk')
                ->type('password_confirmation', 'fkfkfkfk')
                ->press('Register')
                ->pause(2000)
                ->assertSee('The email has already been taken.');
        });
    }

    /** @test */
    public function if_a_guest_tries_to_enter_wrong_password_confirmation_error_mesage_will_be_shown()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/recipes')
                ->press('SIGN IN')
                ->waitForText('Login')
                ->press('Don\'t have an account? Register')
                ->pause(2000)
                ->type('name', 'kristian')
                ->type('email', 'kristian@kristian.com')
                ->type('password', 'fkfkfkfk')
                ->type('password_confirmation', 'asdfasdf')
                ->press('Register')
                ->pause(2000)
                ->assertSee('The password confirmation does not match.');
        });
    }
    /** @test */
    public function if_a_guest_clicks_resetPassword_button_on_login_modal_a_new_resetPassword_modal_will_replace_the_old_one()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/recipes')
                ->waitForText('Save')
                ->press('Save')
                ->waitForText('Login')
                ->press('Forgot Your Password?')
                ->pause(2000)
                ->assertSee('Reset Password');
        });
    }
    public function an_authenticated_user_with_no_recipes_will_be_prompted_to_recipes_when_accessing_storage()
    { }
}
