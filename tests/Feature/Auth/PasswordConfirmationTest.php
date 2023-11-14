<?php

use App\Models\User;

test('confirm password screen can be rendered', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/confirm-password');

    $response
        ->assertSeeLivewire('pages.auth.confirm-password')
        ->assertStatus(200);
});

test('password can be confirmed', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user);

    $component = Livewire::test('pages.auth.confirm-password')
        ->set('password', 'password')
        ->call('confirmPassword');

    $component
        ->assertRedirect('/dashboard')
        ->assertHasNoErrors();
});

test('password is not confirmed with invalid password', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user);

    $component = Livewire::test('pages.auth.confirm-password')
        ->set('password', 'wrong-password')
        ->call('confirmPassword');

    $component
        ->assertNoRedirect()
        ->assertHasErrors('password');
});
