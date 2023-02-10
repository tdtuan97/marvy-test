<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paginate config
    |--------------------------------------------------------------------------
    |
    */

    'default' => [
        'per_page' => 25,
        'page'     => 1,
        'prefix'   => 'page',
        'order'    => 'ASC',
    ],

    'query_fields' => [
        'limit'    => 'per_page',
        'page'     => 'page',
        'order_by' => 'order_by',
        'sort'     => 'sort',
    ],

    'allow_order' => ['asc', 'ASC', 'desc', 'DESC']
];
