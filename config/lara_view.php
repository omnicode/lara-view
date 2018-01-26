<?php
return [
    'theme' => 'https://github.com/twbs/bootstrap/releases/download/v3.3.7/bootstrap-3.3.7-dist.zip',
    'css' => [
        'app.css',
        'core.min.css',
        'bootstrap/css/bootstrap.min.css',
        'template/metisMenu/metisMenu.min.css',
        'template/sb-admin/sb-admin-2.min.css',
        'font-awesome/css/font-awesome.min.css',
        'main.css'
    ],

    'js' => [
        'app.js',
        'core.js',
        'jquery.min.js',
        'bootstrap/js/bootstrap.min.js',
        'main.js',
        'template/metisMenu/metisMenu.min.js',
        'template/sb-admin/sb-admin-2.min.js',
    ],

    'show' => [
        'column_list' => 'list',
    ],

    'index' => [
        'column_list' => 'list',

        'actions' => [
            'list' => [
                'show',
                'edit',
                'delete'
            ]
        ],

        //TODO discuss
        'class' => [
            'tabel' => '',
            'thead' => '',
            'thead.tr' => '',
            'tbody' => '',
            'tbody.tr' => '',
            'thead.tr.td.actions' => ''
        ]
    ],
    'sidebars' => [
        'admin/owner_drawings',
        'countries',
        'currencies',
    ]
];
