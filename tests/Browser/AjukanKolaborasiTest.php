<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AjukanKolaborasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group AjukanKolaborasi
     */

     public function testAjukanKolaborasi1(): void
     {
         $this->browse(function (Browser $browser) {
             $browser->loginAs(User::find(3))
                     ->visit('/')
                     ->clickLink('Kolaborasi')
                     ->assertPathIs('/kolaborasi')
                     ->clickLink('Ajukan')
                     ->assertPathIs('/kolaborasi/ajukan')
                     ->assertSee('Ajukan Kolaborasi')
                     ->screenshot('BK.AjukanKolaborasi.001');
         });
     }
 
     public function testAjukanKolaborasi2(): void
     {
         $this->browse(function (Browser $browser) {
             $browser->loginAs(User::find(3))
                     ->visit('http://localhost:8000')
                     ->assertSee('Kolaborasi')
                     ->clickLink('Kolaborasi')
                     ->assertPathIs('/kolaborasi')
                     ->assertSee('+ Ajukan Kolaborasi')
                     ->clickLink('Ajukan')
                     ->assertPathIs('/kolaborasi/ajukan')
                     ->type('nama', 'User1')
                     ->type('organisasi', 'Organisasi A')
                     ->type('jabatan', 'Jabatan A')
                     ->type('deskripsi_singkat', 'Deskripsi singkat untuk pengujian')
                     ->type('tanggal', '06-01-2024')
                     ->attach('surat', __DIR__ . '/Components/PasFoto.pdf')
                     ->type('email', 'user@gmail.com')
                     ->type('nomor', '082111672920')
                     ->press('Continue to Buat Kolaborasi')
                     ->assertPathIs('/kolaborasi')
                     ->assertSee('Anda berhasil')
                     ->screenshot('BK.AjukanKolaborasi.002');
         });
     }
 
     public function testAjukanKolaborasi3(): void
     {
         $this->browse(function (Browser $browser) {
             $browser->loginAs(User::find(3))
                     ->visit('http://localhost:8000')
                     ->assertSee('Kolaborasi')
                     ->clickLink('Kolaborasi')
                     ->assertPathIs('/kolaborasi')
                     ->assertSee('+ Ajukan Kolaborasi')
                     ->clickLink('Ajukan')
                     ->assertPathIs('/kolaborasi/ajukan')
                     ->type('nama', 'User1')
                     ->type('deskripsi_singkat', 'testing aja')
                     ->type('deskripsi', 'testing aja')
                     ->type('email', 'user1@gmail.com')
                     ->type('password', '123456')
                     ->type('password_confirmation', '123456')
                     ->press('Continue to Buat Kolaborasi')
                     ->waitForText('Berhasil')
                     ->assertSee('Berhasil');
         });
     }
 
     public function testAjukanKolaborasi4(): void
     {
         $this->browse(function (Browser $browser) {
             $browser->loginAs(User::find(3))
                     ->visit('http://localhost:8000')
                     ->assertSee('Kolaborasi')
                     ->clickLink('Kolaborasi')
                     ->assertPathIs('/kolaborasi')
                     ->assertSee('+ Ajukan Kolaborasi')
                     ->clickLink('Ajukan')
                     ->assertPathIs('/kolaborasi/ajukan')
                     ->type('nama', 'User1')
                     ->type('deskripsi_singkat', 'testing aja')
                     ->type('deskripsi', 'testing aja')
                     ->type('email', 'user1@gmail.com')
                     ->type('password', '123456')
                     ->type('password_confirmation', '123456')
                     ->press('Continue to Buat Kolaborasi')
                     ->waitForText('Berhasil')
                     ->assertSee('Berhasil');
         });
     }
}