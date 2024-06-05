<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DashboardOrderNothingTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group DashboardOrderNothing
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->assertSee('Belum ada pesanan yang masuk')
                    ->screenshot('BK.ListOrder.002');
                    
        });
    }
}
