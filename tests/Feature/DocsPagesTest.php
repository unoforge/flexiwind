<?php

test('documentation pages render successfully', function () {
    $this->get('/docs/introduction')->assertOk();
    $this->get('/components/button')->assertOk();
});
test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
