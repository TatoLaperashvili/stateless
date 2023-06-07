<?php
return [
    'id' => 2,
    'type' => 2,
    'name' => 'middle_banner',
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'redirect_link' => [
                'type' => 'text',

            ],
           
            'active' => [
                'type' => 'checkbox',
            ],
         
        ],

        'nonTrans' => [
            'images' => [
                'type' => 'images',

            ],
            
        ]



    ]

];
