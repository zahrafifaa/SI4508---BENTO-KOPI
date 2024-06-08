<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewArtikelTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                    ->assertSee('Artikel')
                    ->clickLink('Artikel')
                    ->assertPathIs('/artikel')
                    ->assertSee('View details');
        });
    }
}
