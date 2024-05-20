<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Enterprise')
                    ->ClickLink('Login')
                    ->assertPathIs('/login')
                    ->clickLink('Register Now!')
                    ->type('text-name', 'faqih')
                    ->type('text-username', 'faqih123')
                    ->type('email', 'faqihreyhan@gmail.com')
                    ->type('password', '123456');
        });
    }
}
