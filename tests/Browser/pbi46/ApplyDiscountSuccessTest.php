<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ApplyDiscountSuccessTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group ApplyDiscountSuccess
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/')
                    ->clickLink('Menu')
                    ->assertPathIs('/menu')
                    ->press('Tambah')
                    ->assertPathIs('/menu')
                    ->assertSee('Menu berhasil ditambahkan')
                    ->click('@cart')
                    ->assertPathIs('/cart')
                    ->type('@discount', 'YUKSELASA') // Masukkan kode diskon
                    ->press('#apply-discount-button') // Tekan tombol terapkan diskon
                    ->assertSee('Kode diskon berhasil diterapkan.')
                    ->screenshot('BK.ApplyDiscount.001');
        });
    }
}
