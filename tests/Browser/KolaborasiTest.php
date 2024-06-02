<?php

namespace Tests\Browser;

use App\Models\Kolaborasi;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class KolaborasiTest extends DuskTestCase
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
                    ->assertPathIs('/kolaborasi');
        });
    }
}
