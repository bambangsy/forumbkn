<?php

use App\Models\Post;

it('has post page', function () {
    $this->get('/')
    ->assertStatus(200);
});

it('can create a post', function () {
    $postData = new Post ([
        'content' => 'This is a test post',
        'user_id' => 1,
        'is_thread' => true,
    ]);

    expect($postData->content)->toBe('This is a test post');
    expect($postData->user_id)->toBe(1);
    expect($postData->is_thread)->toBe(true);
});

it('can create a reply post', function () {
    $postData = new Post ([
        'content' => 'This is a reply post',
        'user_id' => 1,
        'is_thread' => false,
        'is_reply_to' => 1,
    ]);

    expect($postData->content)->toBe('This is a reply post');
    expect($postData->user_id)->toBe(1);
    expect($postData->is_thread)->toBe(false);
    expect($postData->is_reply_to)->toBe(1);
});
