<?php

return [
    'admin' => [
        'class' => 'app\modules\admin\Module',
    ],
    'api' => [
        'class' => 'app\modules\api\Module',
        // ... другие настройки модуля ...
        'modules' => [
            'v1' => [
                'class' => 'app\modules\api\modules\v1\Module',
                // ... другие настройки модуля ...
            ],
        ],
    ],
];