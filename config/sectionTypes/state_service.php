<?php
return [
    'id' => 6,
    'type' => 6,
    'folder' => 'service',
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
			'text' => [
                'type' => 'textarea',
                'max' => '2000',
                'min' => '3',
                'validation' => 'min:3|max:20'
            ],
           
            'active' => [
                'type' => 'checkbox',
            ],
        ],
        'nonTrans' => [

            'organizations' => [
                'type' => 'organizations',

            ],

            'image' => [
                'type' => 'images',
            ],
            'date' => [
                'type' => 'date',
                'required' => 'required',
               'validation' => 'required|max:20'
             ],
			// 'logo' => [
            //     'type' => 'file',

            // ],
        ],
    ]
];
