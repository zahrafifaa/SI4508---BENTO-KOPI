<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class menuFavoriteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group menuFavorite
     */
    public function testFavorite(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/menu')
                    ->press('#Love')
                    ->visit('/')
                    ->maximize()
                    ->assertSee('Coffee 1')
                    ->screenshot('menuFavorite');
        });
    }

    /**
     * A Dusk test example.
     * @group menuFavorite
     */
    public function testUnFavorite(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/')
                    ->maximize()
                    ->press('#unLove')
                    ->refresh()
                    ->assertDontSee('Coffee 1')
                    ->screenshot('menuUnFavorite');
        });
    }
}
