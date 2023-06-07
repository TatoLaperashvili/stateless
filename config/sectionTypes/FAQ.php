<?php
return [
    'id' => 12,
    'type' => 12,
    'folder' => 'question',
    'fields' => [
        'trans' => [
            'question' => [
                'type' => 'text'
            ],

			'answer' => [
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
           
             'date' => [
                'type' => 'date',
                'required' => 'required',
               'validation' => 'required|max:20'
             ],
			
        ],
    ]
];
