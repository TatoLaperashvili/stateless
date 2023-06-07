<?php
return [
    'id' => 9,
    'type' => 9,
    'folder' => 'organizations',
	'paginate' => 16,
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'slug' => [
                'type' => 'text',
                'error_msg' => 'slug_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'desc' => [
                'type' => 'textarea',

            ],
           
           
            'active' => [
                'type' => 'checkbox',
            ],
        ],

        'nonTrans' => [
          
            'image' => [
                'type'=> 'images',
            ],

            'website' => [
            'type' => 'text',
            ],

            'email' => [
                'type' => 'text',
            ],

            'mobile' => [
                'type' => 'text',
            ],
            
           
            

        ],
    ]
];
