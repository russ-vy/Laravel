<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsUpdateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExampleUpdate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/6/edit')
                    ->assertSee('Редактировать новость');
        });
    }
}
