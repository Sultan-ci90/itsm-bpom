<?php

test('the guest is redirected to signin page', function () {
    $response = $this->get('/');

    $response->assertRedirect('/signin');
});

test('signin page can be accessed by guest', function () {
    $response = $this->get('/signin');

    $response->assertStatus(200);
});
