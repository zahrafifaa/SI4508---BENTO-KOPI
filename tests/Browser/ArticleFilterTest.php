<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ArticleFilterTest extends DuskTestCase
{
    /**
     * Filter by category and order.
     * @group ArticleFilter
     * @param Browser $browser
     * @param string $category
     * @param string $order
     * @return void
     */
    public function filterArticles(Browser $browser, $category, $order)
    {
        $browser->select('kategori', $category)
                ->select('urutan', $order)
                ->press('Filter');
    }

    /**
     * A Dusk test example.
     */
    public function testUserCanFilterArtikelByCategoryAndOrder001()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                    ->assertSee('Artikel')
                    ->clickLink('Artikel')
                    ->assertPathIs('/artikel')
                    ->assertSee('View details');

            // Filter by category "umum" and order "terbaru"
            $this->filterArticles($browser, 'umum', 'terbaru');

            $browser->screenshot('BK.ArticleFilterCategory.001');
        });
    }

    public function testUserCanFilterArtikelByCategoryAndOrder002()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                    ->assertSee('Artikel')
                    ->clickLink('Artikel')
                    ->assertPathIs('/artikel')
                    ->assertSee('View details');

            // Filter by category "umum" and order "terbaru"
            $this->filterArticles($browser, 'sosial', 'terbaru');

            $browser->screenshot('BK.ArticleFilterCategory.002');
        });
    }

    public function testUserCanFilterArtikelByCategoryAndOrder003()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                    ->assertSee('Artikel')
                    ->clickLink('Artikel')
                    ->assertPathIs('/artikel')
                    ->assertSee('View details');

            // Filter by category "umum" and order "terbaru"
            $this->filterArticles($browser, 'umum', 'terlama');

            $browser->screenshot('BK.ArticleFilterCategory.003');
        });
    }

    public function testUserCanFilterArtikelByCategoryAndOrder004()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000')
                    ->assertSee('Artikel')
                    ->clickLink('Artikel')
                    ->assertPathIs('/artikel')
                    ->assertSee('View details');

            // Filter by category "umum" and order "terbaru"
            $this->filterArticles($browser, 'sosial', 'terlama');

            $browser->screenshot('BK.ArticleFilterCategory.004');
        });
    }
}
