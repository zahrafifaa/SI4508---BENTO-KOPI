<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class InsertDiscountTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group insertdiscount
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
            ->visit('/')
            ->click('@insert_discount')
            ->assertPathIs('/discounts/create')
                    ->type('code', 'YUKSELASA') // Isi form kode diskon
                    ->type('amount', '10000') // Isi form potongan harga
                    ->press('Simpan Diskon') // Tekan tombol Simpan Diskon
                    ->assertSee('Diskon berhasil ditambahkan') // Cek apakah pesan sukses terlihat
            ->screenshot('BK.InsertDiscount.001');
        });
    }
}
