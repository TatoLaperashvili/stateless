<?php
return [
    'id' => 4,
    'type' => 4,
    'name' => 'citizen_banner',
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
