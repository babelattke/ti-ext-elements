<?php
$config['list']['filter'] = [
    'search' => [
        'prompt' => 'lang:babel.elements::default.elements.text_filter_search',
        'mode' => 'all', // or any, exact
    ],
    'scopes' => [
        'status' => [
            'label' => 'lang:admin::lang.text_filter_status',
            'type' => 'switch',
            'conditions' => 'status = :filtered',
        ],
    ],
];

$config['list']['toolbar'] = [
    'buttons' => [
        'create' => [
            'label' => 'lang:admin::lang.button_new',
            'class' => 'btn btn-primary',
            'href' => 'babel/elements/elements/create',
        ],
        'delete' => [
            'label' => 'lang:admin::lang.button_delete',
            'class' => 'btn btn-danger',
            'data-request' => 'onDelete',
            'data-request-form' => '#list-form',
            'data-request-confirm' => 'lang:admin::lang.alert_warning_confirm',
        ] 
    ],
];

$config['list']['columns'] = [
    'edit' => [
        'type' => 'button',
        'iconCssClass' => 'fa fa-pencil',
        'attributes' => [
            'class' => 'btn btn-edit',
            'href' => 'babel/elements/elements/edit/{element_id}',
        ],
    ],
    'name' => [
        'label' => 'lang:admin::lang.label_name',
        'type' => 'text',
        'searchable' => TRUE,
    ],
    'type_label' => [
        'label' => 'lang:admin::lang.label_type',
        'type' => 'text',
    ],
    'status' => [
        'label' => 'lang:babel.elements::default.elements.column_status',
        'type' => 'switch',
        'searchable' => TRUE,
    ],
    'element_id' => [
        'label' => 'lang:admin::lang.column_id',
        'invisible' => TRUE,
    ],

];

$config['form']['toolbar'] = [
    'buttons' => [
        'save' => [
            'label' => 'lang:admin::lang.button_save',
            'context' => ['create', 'edit'],
            'class' => 'btn btn-primary',
            'data-request' => 'onSave',
            'data-request-submit' => 'true',
        ],
        'saveClose' => [
            'label' => 'lang:admin::lang.button_save_close',
            'context' => ['create', 'edit'],
            'class' => 'btn btn-default',
            'data-request' => 'onSave',
            'data-request-submit' => 'true',
            'data-request-data' => 'close:1',
        ],
        'delete' => [
            'label' => 'lang:admin::lang.button_icon_delete',
            'context' => ['edit'],
            'class' => 'btn btn-danger',
            'data-request' => 'onDelete',
            'data-request-submit' => 'true',
            'data-request-confirm' => 'lang:admin::lang.alert_warning_confirm',
        ],
        'cancel' => [
            'label' => 'Cancel',
            'context' => ['create', 'edit'],
            'class' => 'btn btn-danger',    
        ],
    ],
];

$config['form']['fields'] = [    
    'name' => [
        'label' => 'lang:admin::lang.label_name',
        'type' => 'text',
    ],
    'type' => [
        'label' => 'lang:babel.elements::default.elements.label_type',
        'type' => 'radiotoggle',
        'default' => 'typeB',
        'options' => [            
            //'typeA' => 'typeA',    requires repeater with image :/        
            'typeB' => 'lang:babel.elements::default.types.main_header',
            //'typeC' => 'lang:babel.elements::default.types.categories',
            'typeD' => 'lang:babel.elements::default.types.featured',            
            'typeF' => 'lang:babel.elements::default.types.info_cards',
            'typeG' => 'lang:babel.elements::default.types.video',
            'typeH' => 'lang:babel.elements::default.types.image',
            'typeI' => 'lang:babel.elements::default.types.gallery',
            'typeJ' => 'lang:babel.elements::default.types.menu_list',
        ],
    ],
    'element_images' => [
        'label' => 'lang:babel.elements::default.elements.label_image',
        'type' => 'mediafinder',
        'mode' => 'grid',
        'commentAbove' => 'lang:babel.elements::default.elements_component.text_image_help',
        'isMulti' => TRUE,
        'trigger' => [
            'action' => 'show',
            'field' => 'type',
            'condition' => 'value[typeA][typeI]',
        ],
    ],
    'element_image' => [
        'label' => 'lang:babel.elements::default.elements.label_image',
        'type' => 'mediafinder',
        'mode' => 'grid',
        'commentAbove' => 'lang:babel.elements::default.elements_component.text_image_help',
        'isMulti' => FALSE,
        'trigger' => [
            'action' => 'show',
            'field' => 'type',
            'condition' => 'value[typeB][typeG][typeH]',
        ],
    ],
    'element_images_info' => [
        'type' => 'repeater',
        'commentAbove' => 'Add element information',
        'form' => [
            'fields' => [                                    
                'title' => [
                    'label' => 'Main title',
                    'type' => 'text',
                    'rules' => 'required',                    
                ],
                'subTitle' => [
                    'label' => 'Sub Title',
                    'type' => 'text',
                    'rules' => 'required',
                ],
                'url' => [
                    'label' => 'Image Url',
                    'type' => 'text',
                    'rules' => 'required',
                ],
            ],
        ],
        'trigger' => [
            'action' => 'show',
            'field' => 'type',
            'condition' => 'value[typeA]',
        ],
    ],
    'steps' => [
        'type' => 'repeater',
        'commentAbove' => 'lang:babel.elements::default.elements_component.add_info_cards',
        'form' => [
            'fields' => [                                    
                'title' => [
                    'label' => 'Main title',
                    'type' => 'text',
                    'rules' => 'required',                    
                ],
                'subTitle' => [
                    'label' => 'Sub Title',
                    'type' => 'text',
                    'rules' => 'required',
                ],
                'icon' => [
                    'label' => 'lang:babel.elements::default.elements_component.cards_icon_label',
                    'type' => 'text',
                    'rules' => 'required',
                ],
            ],
        ],
        'trigger' => [
            'action' => 'show',
            'field' => 'type',
            'condition' => 'value[typeF]',
        ],
    ],
    'title_text' => [
        'label' => 'lang:babel.elements::default.elements_component.title_text',
        'type' => 'text',        
    ],
    'subtitle_text' => [
        'label' => 'lang:babel.elements::default.elements_component.subtitle_text',
        'type' => 'text', 
        'trigger' => [
            'action' => 'show',
            'field' => 'type',
            'condition' => 'value[typeD][typeF][typeG][typeH][typeI]',
        ],       
    ],
    'content_text' => [
        'label' => 'lang:babel.elements::default.elements_component.content_text',
        'type' => 'richeditor',
        'cssClass' => 'richeditor-fluid', 
        'trigger' => [
            'action' => 'show',
            'field' => 'type',
            'condition' => 'value[typeA][typeB]',
        ], 
    ],
    'comment_text' => [
        'label' => 'lang:babel.elements::default.elements_component.comment_text',
        'type' => 'text',        
    ],  
    'steps_background' => [
        'label' => 'lang:babel.elements::default.elements_component.steps_background',
        'type' => 'colorpicker',
        'span' => 'right',
        'default' => '#112113',
        'rules' => 'required',
        'trigger' => [
            'action' => 'show',
            'field' => 'type',
            'condition' => 'value[typeH]',
        ],
    ],   
    'button_status' => [
        'label' => 'lang:babel.elements::default.elements_component.button_status',
        'type' => 'switch',
        'default' => FALSE,
        'span' => 'left',
        'trigger' => [
            'action' => 'show',
            'field' => 'type',
            'condition' => 'value[typeB]',
        ],
    ],
    'button_text' => [
        'label' => 'Button Text',
        'type' => 'text',
        'span' => 'right',
        'trigger' => [
            'action' => 'show',
            'field' => 'button_status',
            'condition' => 'checked',
        ], 
    ], 
    'click_url' => [
        'label' => 'URL',
        'type' => 'text',        
        'trigger' => [
            'action' => 'show',
            'field' => 'type',
            'condition' => 'value[typeA][typeB][typeG][typeH]',
        ],  
        'trigger' => [
            'action' => 'show',
            'field' => 'button_status',
            'condition' => 'checked',
        ],  
    ],
    /*'language_id' => [
        'label' => 'lang:babel.elements::default.elements.label_language',
        'type' => 'relation',
        'relationFrom' => 'language',
        'placeholder' => 'lang:admin::lang.text_please_select',
    ],*/
    'status' => [
        'label' => 'lang:babel.elements::default.elements_component.label_status',
        'type' => 'switch',
        'default' => TRUE,
    ],    
];

return $config;
