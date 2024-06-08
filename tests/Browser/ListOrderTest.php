<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListOrderTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group listorder
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->assertPathIs('/')
                    ->screenshot('apaygterjadi')
                    ->assertSee('Belum ada')
                    ->screenshot('BK.ListOrder.002');
        });
    }
}
