<?php
return [
    'id' => 3,
    'type' => 3,
    'name' => 'state_banner',
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

            'icon' => [
                'type'=> 'bannericon',
            ],

           
            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20',
                'placeholder' => 'sdf'
            ],
        ]



    ]

];
