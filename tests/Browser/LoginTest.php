<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Enterprise')
                    ->clickLink('Login')
                    ->assertPathIs('/login')
                    ->type('email', 'user1@gmail.com')
                    ->type('password','123456')
                    ->press('Login')
                    ->assertPathIs('/');
                    
        });
    }
}
