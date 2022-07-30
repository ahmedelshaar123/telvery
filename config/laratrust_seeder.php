<?php

return [
    'role_structure' => [
        'admin' => [
            'become_merchants' => 'r,ac,dc',
            'subscriptions' => 'r,d',
            'contacts' => 'r,d',
            'questions' => 'c,r,u,d',
            'governorates' => 'c,r,u,d',
            'coupons' => 'c,r,d',
            'sliders' => 'c,r,u,d',
            'payment_methods' => 'c,r,u,d',
            'brands' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'sub-categories' => 'c,r,u,d',
            'products' => 'c,s,r,u,d',
            'clients' => 'r,s,ac,dc',
            'reviews' => 'r,s,d',
            'replies' => 'd',
            'teams' => 'c,r,u,d',
            'orders' => 'r,s,u',
            'users' => 'c,r,u,d,ac,dc',
            'settings' => 'r,u',
        ],
        'user' => []
        ,
    ],
    'permissions_map' => [
        'c' => 'create',
        's' => 'show',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'ac' => 'activated',
        'dc' => 'deactivated',
    ]
];
