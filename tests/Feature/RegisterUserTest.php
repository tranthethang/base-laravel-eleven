<?php

use function PHPUnit\Framework\assertEquals;

test('register new user - success', function () {
    $name     = mb_substr('user.'.strtolower($this->faker->word), 0, 12);
    $email    = $name.'@gmail.com';
    $password = $this->faker->password(8, 15);

    $mock = [
        'name'                  => $name,
        'email'                 => $email,
        'email_confirmation'    => $email,
        'password'              => $password,
        'password_confirmation' => $password,
    ];

    $response = $this->post(route('users.register'), $mock);

    assertEquals($response->status(), '201');
});
