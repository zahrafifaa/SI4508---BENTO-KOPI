<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AjukanKolaborasi extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testAjukanKolaborasi1(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                ->assertSee('Kolaborasi')
                ->clickLink('Kolaborasi')
                ->assertPathIs('/kolaborasi')
                ->assertSee('+ Ajukan Kolaborasi')
                ->clickLink('Ajukan');
        });
    }
    public function testAjukanKolaborasi2(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                ->assertSee('Kolaborasi')
                ->clickLink('Kolaborasi')
                ->assertPathIs('/kolaborasi')
                ->assertSee('+ Ajukan Kolaborasi')
                ->clickLink('Ajukan')
                ->assertPathIs('/kolaborasi/ajukan')
                ->attach('gambar', __DIR__ . '\Components\HP_Blue_RGB_150_MX.png')
                ->type('nama', 'Zahra Afifa Aulia')
                ->type('deskripsi_singkat', 'testing aja')
                ->type('deskripsi', 'testing aja')
                ->type('email', 'zara7@gmail.com')
                ->type('password', 'zara1183')
                ->type('password_confirmation', 'zara1183')
                ->press('Continue to Buat Kolaborasi')
                ->waitForText('Berhasil')
                ->assertSee('Berhasil');
        });
    }
    public function testAjukanKolaborasi3(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                ->assertSee('Kolaborasi')
                ->clickLink('Kolaborasi')
                ->assertPathIs('/kolaborasi')
                ->assertSee('+ Ajukan Kolaborasi')
                ->clickLink('Ajukan')
                ->assertPathIs('/kolaborasi/ajukan')
                ->type('nama', 'Zahra Afifa Aulia')
                ->type('deskripsi_singkat', 'testing aja')
                ->type('deskripsi', 'testing aja')
                ->type('email', 'zara7@gmail.com')
                ->type('password', 'zara1183')
                ->type('password_confirmation', 'zara1183')
                ->press('Continue to Buat Kolaborasi')
                ->waitForText('Berhasil')
                ->assertSee('Berhasil');
        });
    }
    public function testAjukanKolaborasi4(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                ->assertSee('Kolaborasi')
                ->clickLink('Kolaborasi')
                ->assertPathIs('/kolaborasi')
                ->assertSee('+ Ajukan Kolaborasi')
                ->clickLink('Ajukan')
                ->assertPathIs('/kolaborasi/ajukan')
                ->press('Continue to Buat Kolaborasi')
                ->waitForText('Berhasil')
                ->assertSee('Berhasil');
        });
    }
}
