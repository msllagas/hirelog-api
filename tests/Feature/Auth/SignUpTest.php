<?php

use function Pest\Laravel\assertDatabaseHas;

test('it creates a user', function () {
    $payload = [
        'name' => 'Mandy',
        'email' => 'mandy@email.com',
        'password' => 'my_password@hirelog',
    ];

    $response = $this->postJson('/api/signup', $payload);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ]);

    assertDatabaseHas('users', [
        'email' => $payload['email'],
    ]);
});
