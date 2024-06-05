<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OrderStatusTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group orderstatus
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->select('status_pemesanan', 'Diproses') // Pilih status baru
                    ->press('Simpan') // Tekan tombol simpan
                    ->assertSee('Status pemesanan berhasil diubah') // Verifikasi pesan sukses
                    ->screenshot('BK.ChangeOrderStatus.001');
        });
    }
}
