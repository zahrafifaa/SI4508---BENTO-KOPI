<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReservasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group reservasi
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Reservasi')
                    ->assertPathIs('/reservasi')
                    ->type('nama','Nayara')
                    ->type('no_telp','08131313131')
                    ->type('jml_pengunjung','4')
                    ->press('Cek Ketersediaan');
        });
    }
}
