<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DashboardOrderTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group DashboardOrder
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->assertSee('Detail Pesanan') // Verifikasi pesan sukses
                    ->screenshot('BK.ListOrder.001');
        });
    }
}
