<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            Browser::$baseUrl = 'https://github.com';

            $browser->visit('/')
                    ->press('a[href^="/login"]')
                    ->type('login', 'fridzema@gmail.com')
                    ->type('password', 'swaax91')
                    ->visit('/taylorotwell')
                    ->click('a[title="Followers"]')
                    ->pause(10000)
                    ->click('button[aria-label="Follow this person"]')
                    ->pause(10000);
        });
    }
}
