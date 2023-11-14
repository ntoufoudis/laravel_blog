<?php
/** @noinspection PhpUnhandledExceptionInspection */

use App\Models\User;

test('profile page is displayed', function () {

    $user = User::factory()->create();

    Livewire::actingAs($user);

    Livewire::test('pages.profile')->assertOk();
});

test('profile information can be updated', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user);

    $component = Livewire::test('pages.profile')
    ->set('name', 'Test User')
    ->set('email', 'test@example.com')
    ->call('updateProfileInformation');

    $component
        ->assertHasNoErrors()
        ->assertNoRedirect();

    $user->refresh();

    $this->assertSame('Test User', $user->name);
    $this->assertSame('test@example.com', $user->email);
    $this->assertNull($user->email_verified_at);
});

test('email verification status is unchanged when the email address is unchanged', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user);

    $component = Livewire::test('pages.profile')
        ->set('name', 'Test User')
        ->set('email', $user->email)
        ->call('updateProfileInformation');

    $component
        ->assertHasNoErrors()
        ->assertNoRedirect();

    $this->assertNotNull($user->refresh()->email_verified_at);
});

test('user can delete their account', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user);

    $component = Livewire::test('pages.profile')
        ->set('delete_password', 'password')
        ->call('deleteUser');

    $component
        ->assertHasNoErrors()
        ->assertRedirect('/');

    $this->assertGuest();
    $this->assertNull($user->fresh());
});

test('correct password must be provided to delete account', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user);

    $component = Livewire::test('pages.profile')
        ->set('delete_password', 'wrong-password')
        ->call('deleteUser');

    $component
        ->assertHasErrors('delete_password')
        ->assertNoRedirect();

    $this->assertNotNull($user->fresh());
});
