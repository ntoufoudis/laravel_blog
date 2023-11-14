<?php

use App\Livewire\Pages\Auth\Login;
use App\Models\User;
use App\Providers\RouteServiceProvider;

test('login screen can be rendered', function () {
    Livewire::test(Login::class)->assertOk();
});

test('users can authenticate using the login screen', function () {
   $user = User::factory()->create();

   $component = Livewire::test(Login::class)
       ->set('form.email', $user->email)
       ->set('form.password', 'password')
       ->call('login');

   $component
       ->assertHasNoErrors()
       ->assertRedirect(RouteServiceProvider::HOME);

   $this->assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $component = Livewire::test(Login::class)
        ->set('form.email', $user->email)
        ->set('form.password', 'wrong-password')
        ->call('login');

    $component
        ->assertHasErrors()
        ->assertNoRedirect();

    $this->assertGuest();

});

test('users can not authenticate with invalid email', function () {
    $user = User::factory()->create();

    $component = Livewire::test(Login::class)
        ->set('form.email', 'wrong@email.com')
        ->set('form.password', 'password')
        ->call('login');

    $component
        ->assertHasErrors()
        ->assertNoRedirect();

    $this->assertGuest();
});

test('navigation menu can be rendered', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get('/dashboard');

    $response
        ->assertSeeLivewire('layout.navigation')
        ->assertOk();
});

test('users can logout', function () {

    $user = User::factory()->create();

    Livewire::actingAs($user);

    $component = Livewire::test('layout.navigation')
        ->call('logout');

    $component
        ->assertHasNoErrors()
        ->assertRedirect('/');

    $this->assertGuest();
});
