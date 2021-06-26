<?php

namespace Babel\Elements\Components;

use Babel\Elements\Models\Elements as ElementModel;
use Babel\Elements\Models\Menus_model as FeaturedMenuItemsModel;
use System\Classes\BaseComponent;
use Main\Models\Image_tool_model;
use System\Models\Themes_model;
use File;

class Elements extends BaseComponent
{
    public $element;

    public function defineProperties()
    {
        return [
            'element_id' => [
                'label' => 'lang:babel.elements::default.elements.column_element',
                'type' => 'select',
                'validationRule' => 'required|integer',
            ],
            'elementWidth' => [
                'label' => 'lang:babel.elements::default.elements.label_width',
                'span' => 'left',
                'type' => 'number',
                'default' => 400,
                'validationRule' => 'required|integer',
                'show' => false,
            ],
            'elementHeight' => [
                'label' => 'lang:babel.elements::default.elements.label_height',
                'span' => 'right',
                'type' => 'text',
                'default' => 400,
                'validationRule' => 'required|integer',
                'show' => false,
            ],
            'featured_status' => [
                'label' => 'Featured Items Element?',
                'type' => 'switch',
                'default' => FALSE,
                'span' => 'left',                
            ],
            'menu_items' => [
                'label' => 'lang:babel.elements::default.featured.label_menus',
                'type' => 'selectlist',
                'mode' => 'checkbox',
                'validationRule' => 'array',        
                'trigger' => [
                    'action' => 'show',
                    'field' => 'featured_status',
                    'condition' => 'checked',
                ],
            ],         
        ];
    }

    public function onRun() {
        //Copies extension SCSS file to all the current themes
        $this->createScss();

        //Main CSS File
        //$this->addCss('css/elements.css', 'elements-css');

        //MagnificPopUp
        $this->addJs('js/jquery.magnific-popup.min.js', 'jquery-magnific-popup.min-js');
        $this->addCss('css/magnific-popup.css', 'magnific-popup-css');

        //$this->addCss('css/elements_style.css', 'elements-style-css');        
        $this->addJs('js/babel-elements-ext.js', 'babel-elements-ext-js');

        //Slick Files
        $this->addCss('css/slick.css', 'slick-css');
        $this->addJs('js/slick.min.js', 'slick-min-js');
        
        $this->page['elementMenuItems'] = $this->loadItems();

        //Slider Category Width and Heigth
        $this->page['sliderWidth'] = $this->property('elementWidth', 400);
        $this->page['sliderHeight'] = $this->property('elementHeight', 400);
    }

    protected function loadItems()
    {
        return FeaturedMenuItemsModel::getByIds([
            'page' => '1',
            'pageLimit' => $this->property('limit'),
            'menuIds' => $this->property('menu_items', []),
        ]);
    }

    public static function getMenuItemsOptions()
    {
        return FeaturedMenuItemsModel::dropdown('menu_name');
    }

    public static function getElementIdOptions()
    {
        return ElementModel::isEnabled()->dropdown('name');
    }

    public function onRender()
    {
        $this->page['element'] = $this->loadElement();
    }

    protected function loadElement()
    {
        if (isset($this->element))
            return $this->element;

        $model = ElementModel::isEnabled()
            ->where('element_id', $this->property('element_id'))->first();

        if (!$model) return null;

        $element = new \stdClass;
        $element->id = 'element-slideshow-'.uniqid();
        $element->type = $model->type;
        $element->titleText = $model->title_text;
        $element->subTitleText = $model->subtitle_text;
        $element->contentText = $model->content_text;
        $element->commentText = $model->comment_text;

        $element->istypeA = ($model->type == 'typeA');
        $element->istypeB = ($model->type == 'typeB');
        $element->istypeC = ($model->type == 'typeC');
        $element->istypeD = ($model->type == 'typeD');
        
        $element->istypeF = ($model->type == 'typeF');
        $element->istypeG = ($model->type == 'typeG');
        $element->istypeH = ($model->type == 'typeH');
        $element->istypeI = ($model->type == 'typeI');
        $element->istypeJ = ($model->type == 'typeJ');
        $element->istypeK = ($model->type == 'typeK');
        $element->istypeL = ($model->type == 'typeL');

        $element->imgInfo = $model->element_images_info;

        $element->steps = $model->steps;
        $element->stepsBackground = $model->steps_background;

        $element->buttonStatus = $model->button_status;
        $element->buttonText = $model->button_text;
        $element->clickUrl = site_url($model->click_url);
        
        
        switch ($model->type) {
            case 'typeA':
                $element->multiImages = $this->prepareArrayImages($model);
                break;
            case 'typeB':
                $element->singleImage = $model->element_image;
                break;
            case 'typeG':
                    $element->singleImage = $model->element_image;
                    break;
            case 'typeH':
                $element->singleImage = $model->element_image;
                break;
            case 'typeI':               
                $element->galleryImages = $this->prepareArrayImages($model);
                break;
            case 'typeJ':
                $element->singleImage = $model->element_image;
            case 'typeK':
                $element->singleImage = $model->element_image;
            case 'typeL':
                $element->singleImage = $model->element_image;
                break;
        }
        
        
        return $this->element = $element;
    }

    protected function prepareArrayImages(ElementModel $element)    {
        

        $images = array_filter($element->element_images);
        
        return array_map(function ($path) {
            $imageHeight = $this->property('width');
            $imageWidth = $this->property('height');

            return [
                'name' => $path,
                'height' => $imageHeight,
                'width' => $imageWidth,
                'url' => Image_tool_model::resize($path, [
                    'width' => $imageWidth,
                    'height' => $imageHeight,
                ]),
            ];
        }, $images);
    }

    protected function prepareImages(ElementModel $element)
    {
        $image = $element->element_image;

        return function ($path) {
            $imageHeight = $this->property('width');
            $imageWidth = $this->property('height');

            return [
                'name' => basename($path),
                'height' => $imageHeight,
                'width' => $imageWidth,
                'url' => Image_tool_model::resize($path, [
                    'width' => $imageWidth,
                    'height' => $imageHeight,
                ]),
            ];
        };
    }

    protected function createScss(){
        

        Themes_model::syncAll();
        $themes = Themes_model::all();
        $scssAdded = [];

        /** @var \System\Models\Themes_model */
        foreach ($themes as $theme) {
            $themeDirectory = theme_path($theme->themeClass->getDirName());

            $scssPath = $themeDirectory . '/assets/src/scss/extensions/_babel_elements.scss';
            $importPath = $themeDirectory . '/assets/src/scss/extensions/_+import.extensions.scss';
            $newScssPath =  $themeDirectory . '/assets/src/scss/extensions';
            
            if (!File::exists($newScssPath)){
                File::makeDirectory($newScssPath, 0777, true);
            }

            File::copy($this->assetPath.'/scss/_+import.extensions.scss', $importPath);
            File::copy($this->assetPath.'/scss/_babel_elements.scss', $scssPath);
            
            $scssAdded[] = $scssPath;
            
        }
        
    }
}
