<?php

namespace Babel\Elements\Controllers;

use AdminMenu;

class Elements extends \Admin\Classes\AdminController
{
    public $implement = [
        'Admin\Actions\ListController',
        'Admin\Actions\FormController',
    ];

    public $listConfig = [
        'list' => [
            'model' => 'Babel\Elements\Models\Elements',
            'title' => 'lang:babel.elements::default.elements.text_title',
            'emptyMessage' => 'lang:babel.elements::default.elements.text_empty',
            'defaultSort' => ['element_id', 'DESC'],
            'configFile' => 'elements',
        ],
    ];

    public $formConfig = [
        'name' => 'lang:babel.elements::default.elements.text_form_name',
        'model' => 'Babel\Elements\Models\Elements',
        'create' => [
            'title' => 'lang:admin::lang.form.create_title',
            'redirect' => 'babel/elements/elements/edit/{element_id}',
            'redirectClose' => 'babel/elements/elements',
        ],
        'edit' => [
            'title' => 'lang:admin::lang.form.edit_title',
            'redirect' => 'babel/elements/elements/edit/{element_id}',
            'redirectClose' => 'babel/elements/elements',
        ],
        'preview' => [
            'title' => 'lang:admin::lang.form.preview_title',
            'redirect' => 'babel/elements/elements',
        ],
        'delete' => [
            'redirect' => 'babel/elements/elements',
        ],
        'configFile' => 'elements',
    ];

    protected $requiredPermissions = 'Babel.Elements.ManageElements';

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('elements', 'design');
    }

    public function formValidate($model, $form)
    {
        $namedRules = [
            ['name', 'lang:admin::lang.label_name', 'required|min:2|max:255'],
            ['title_text', 'lang:babel.elements::default.elements_component.title_text', 'required|min:2|max:255'],
            ['content_text', 'lang:babel.elements::default.elements_component.content_text', 'required_if:typeA,typeB |min:2|max:2000'],
            ['comment_text', 'lang:babel.elements::default.elements_component.comment_text', 'required|min:2|max:50'],
            ['type', 'lang:babel.elements::default.elements.label_type', 'required|alpha|max:12'],
            ['click_url', 'lang:babel.elements::default.elements.label_click_url', 'required_if:typeA,typeB|min:2|max:255'],
            ['image_code', 'lang:babel.elements::default.elements.label_image', 'required_if:type,image'],
            ['custom_code', 'lang:babel.elements::default.elements.label_custom_code', 'required_if:type,custom'],
            ['element_images_info', 'element_images_info Text Here', 'required_if:type,typeA'],
            ['alt_text', 'lang:babel.elements::default.elements.label_alt_text', 'required_if:type,image|min:2|max:255'],
            ['image_code', 'lang:babel.elements::default.elements.label_image', 'required_if:type,image'],
            ['steps', 'steps', 'required_if:type,typeE'],
            ['steps_background', 'steps_background', 'required_if:type,typeE'],
            ['status', 'lang:admin::lang.label_status', 'required|integer'],
        ];

        return $this->validatePasses(post($form->arrayName), $namedRules);
    }
}
