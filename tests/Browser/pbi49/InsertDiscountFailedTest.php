<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class InsertDiscountFailedTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group InsertDiscountFailed
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
            ->visit('/')
            ->click('#discount')
            ->assertPathIs('/discounts/create')
            ->type('code', 'YUKSELASA') // Isi form kode diskon
            ->type('amount', '10000') // Isi form potongan harga
            ->press('Simpan Diskon') // Tekan tombol Simpan Diskon
            ->assertSee('Kode diskon sudah terdapat di database!') // Cek apakah pesan sukses terlihat
            ->screenshot('BK.InsertDiscount.002');
        });
    }
}
