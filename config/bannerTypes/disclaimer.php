<?php
return [
    'id' => 5,
    'type' => 5,
    'name' => 'Disclaimer',
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'text' => [
                'type' =>'textarea'
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

       
        ]



    ]

];