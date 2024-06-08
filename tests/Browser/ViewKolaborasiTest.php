<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewKolaborasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                    ->assertSee('Kolaborasi')
                    ->clickLink('Kolaborasi')
                    ->assertPathIs('/kolaborasi')
                    ->assertSee('View details')
                    ->clickLink('View details')
                    ;
        });
    }
}