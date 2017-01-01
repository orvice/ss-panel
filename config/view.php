<?php

return [

    'paths' => [
        realpath(base_path('/resources/views/default')),
    ],

    'compiled' => env('VIEW_CACHE_PATH', realpath(base_path('/storage/framework/views'))),

    'enable_functions' => ['config', 'lang', 'conf', 'user', 'get_version'],
];
