<?php

return [
    'main_name' => 'Articles',
    'back_to_list' => '< To the list of articles',
    'admin_index' => [
        'title' => 'Articles List',
        'table' => [
            'title' => 'Title',
            'time' => 'Publish Time',
            'actions' => 'Actions',
        ],
        'buttons' => [
            'new' => 'New Article',
            'edit' => 'Edit',
            'delete' => 'Delete',
        ]
    ],
    'create' => [
        'title' => 'New Article',
        'inputs' => [
            'title' => 'Title',
            'meta' => 'Meta Data',
            'image' => 'Image',
            'text' => 'Text',
        ],
        'hints' => [
            'description' => 'Short content description for SEO optimization',
        ],
        'buttons' => [
            'save' => 'Save',
        ],
    ],
    'edit' => [
        'title' => 'Edit the Article',
    ],
];
