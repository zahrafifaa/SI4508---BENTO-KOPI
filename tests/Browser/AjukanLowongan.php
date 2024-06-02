<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AjukanLowongan extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testAjukanLowongan1(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                    ->assertSee('Apply')
                    ->clickLink('Apply')
                    ->assertPathIs('/lowongan')
                    ->clickLink('View details') 
                    ->assertPathIs('/lowongan/2') 
                    ->clickLink('Apply Sekarang'); 
        });
    }
    
    public function testAjukanLowongan2(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                    ->assertSee('Apply')
                    ->clickLink('Apply')
                    ->assertPathIs('/lowongan')
                    ->clickLink('View details') 
                    ->assertPathIs('/lowongan/2') 
                    ->clickLink('Apply Sekarang')
                    ->assertPathIs('/lowongan/2/apply')
                    ->type('nama', 'Zahra Afifa Aulia')
                    ->select('jenis_kelamin', 'Perempuan')
                    ->type('tanggal_lahir', '2000-01-01')
                    ->type('tempat_lahir', 'Bandung Kidul')
                    ->type('alamat', 'Komp Buanasari Jl Buanasari V no 4 RT 08 RW 04 Kel Kujangsari Kec Bandung Kidul Kota Bandung 40287')
                    ->type('nomor_hp', '40287')
                    ->type('email', 'zara6@gmail.com')
                    ->type('pengalaman_kerja', '5')
                    ->attach('foto', __DIR__.'\Components\HP_Blue_RGB_150_MX.png')
                    ->attach('cv', __DIR__.'\Components\HP_Blue_RGB_150_MX.pdf')
                    ->script([
                        '$(".btnApply").trigger("click");'
                    ]);
            // Wait for the SweetAlert2 modal to appear and confirm the action
            $browser->waitFor('.swal2-container', 5)
                    ->press('Yakin!')
                    ->waitForLocation('/lowongan/2/apply') // Adjust the path to where the form submits
                    ->assertSee('Berhasil'); 
        });
    }
    public function testAjukanLowongan3(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                    ->assertSee('Apply')
                    ->clickLink('Apply')
                    ->assertPathIs('/lowongan')
                    ->clickLink('View details') 
                    ->assertPathIs('/lowongan/2') 
                    ->clickLink('Apply Sekarang')
                    ->assertPathIs('/lowongan/2/apply')
                    ->script([
                        '$(".btnApply").trigger("click");'
                    ]);
            // Wait for the SweetAlert2 modal to appear and confirm the action
            $browser->waitFor('.swal2-container', 5)
                    ->press('Yakin!')
                    ->waitForLocation('/lowongan/2/apply') // Adjust the path to where the form submits
                    ->assertSee('Berhasil'); 
        });
    }

}
