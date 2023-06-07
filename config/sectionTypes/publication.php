<?php
return [
    'id' => 10,
    'type' => 10,
    'folder' => 'publications',
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
           
            'file' => [
                'type' => 'file',

            ],
            'active' => [
                'type' => 'checkbox',
            ],
            
        ],
        'nonTrans' => [

            
          'image' => [
            'type' => 'images'
          ],
          
            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20'
            ],
          

        ],




    ]

];
