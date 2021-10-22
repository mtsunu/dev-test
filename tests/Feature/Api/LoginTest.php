<?php

use function Pest\Laravel\post;

it('should return token on valid credentials', function () {
    // arange
    // create user

    $response = $this->post('/api/auth/login', [
        'email' => 'mukidi@gmail.com',
        'password' => 'rahasia',
    ]);

    $response->assertStatus(200);
    $token = $response->json('access_token');

    post('/api/auth/me', [], [
        'Authorization' => 'Bearer ' . $token
    ])
        ->assertSuccessful()
        ->assertJson([
            'email' => 'mukidi@gmail.com'
        ]);
});
