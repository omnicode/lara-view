<?php
return [
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
    ]
];
