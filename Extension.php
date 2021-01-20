<?php namespace Babel\Elements;

use System\Classes\BaseExtension;
use Illuminate\Support\Facades\Event;
use Log;

/**
 * Babel Elements Extension Information File
 */
class Extension extends BaseExtension
{
    /**
     * Returns information about this extension.
     *
     * @return array
     */
    /*public function extensionMeta()
    {
        return [
            'name'        => 'BabelElements',
            'author'      => 'Babel',
            'description' => 'Babel Elements Extension Settings',
            'icon'        => 'fa-plug',
            'version'     => '1.0.0'
        ];
    }*/

    /**
     * Register method, called when the extension is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Registers any front-end components implemented in this extension.
     *
     * @return array
     */
    public function registerComponents()
    {        
        return [            
            'Babel\Elements\Components\Elements' => [
                'code' => 'Elements',
                'name' => 'Babel Elements',
                'description' => 'Babel Elements Component',
            ],
        ];
    }

    /**
     * Registers any admin permissions used by this extension.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'Babel.Elements.ManageElements' => [
                'description' => 'Create, modify and delete elements',
                'group' => 'module',
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'design' => [
                'child' => [
                    'babel_elements' => [
                        'priority' => 70,
                        'class' => 'elements',
                        'icon' => 'fas fa-sitemap',
                        'href' => admin_url('babel/elements/elements'),
                        'title' => lang('babel.elements::default.elements_component.text_side_menu'),
                        'permission' => ['Babel.Elements.ManageElements'],
                    ],
                ],
            ],
        ];
    }  
      
}
