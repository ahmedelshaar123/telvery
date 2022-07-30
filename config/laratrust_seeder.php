<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
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
            'sub_categories' => 'c,r,u,d',
            'products' => 's,r',
            'clients' => 'r,s,ac,dc',
            'reviews' => 'r,s,d',
            'replies' => 'd',
            'teams' => 'c,r,u,d',
            'orders' => 'r,s,u',
            'users' => 'c,r,u,d,ac,dc',
            'settings' => 'r,u',
            'static_pages' => 'r,u',
        ],
        'user' => []
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'ac' => 'activated',
        'dc' => 'deactivated'
    ]
];
