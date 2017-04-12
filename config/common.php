<?php
return [
    'path' => [
        'upload' => '/uploads',
        'image' => '/uploads/images',
    ],

    'user' => [
        'default_avatar' => 'default.jpg',
        'role' => [
            'user' => 1,
            'partner' => 2,
            'admin' => 3,
        ],
        'status' => [
            'activated' => 1,
            'unactivated' => 0,
        ],
        'task_bar_status' => [
            'update_profile' => 1,
            'change_password' => 2,
        ]
    ],

    'garage' => [
        'default_avatar' => 'default.jpg',
        'status' => [
            'activated' => 1,
            'unactivated' => 0,
        ],
    ],
    'paging_number' => 10,

    'article' => [
        'status' => [
            'activated' => 1,
            'unactivated' => 0,
        ],
    ],
];
