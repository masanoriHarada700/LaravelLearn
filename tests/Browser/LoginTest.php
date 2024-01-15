<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSuccessfulLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $browser->visit('/login') //パスを変更する
                    ->type('email', $user->email) //メールアドレスを入力する
                    ->type('password', 'password') //パスワードを入力する
                    ->press('LOG IN')
                    ->assertPathIs('/tweet')
                    ->assertSee('つぶやきアプリ');
        });
    }
}
