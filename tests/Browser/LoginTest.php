<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group Login
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('BentoKopi')
                    ->type('email', 'faqih@mail.com')
                    ->type('password', '123456')
                    ->press('Login')
                    ->assertPathIs('/');
        });
    }
}