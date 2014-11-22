<?php
return [
    'createUsers' => [
        'type' => 2,
        'description' => 'Create Users',
    ],
    'editUserProfile' => [
        'type' => 2,
        'description' => 'Edit User Profile',
    ],
    'user' => [
        'type' => 1,
        'ruleName' => 'userRole',
    ],
    'editor' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'user',
            'editUserProfile',
        ],
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'editor',
            'createUsers',
        ],
    ],
];
