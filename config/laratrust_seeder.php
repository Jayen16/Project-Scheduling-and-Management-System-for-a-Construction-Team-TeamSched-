<?php

return [
 
    'create_users' => false,

    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
         
        ],
        'manager' => [
          
        ],
        'supervisor' => [
        ],
        'manpower' => [
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
