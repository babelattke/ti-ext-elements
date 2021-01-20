<?php

namespace Babel\Elements\Models;

use Main\Models\Image_tool_model;
use Babel\Elements\Models\Menus_model as FeaturedMenuItemsModel;
use Model;

/**
 * Elements Model Class
 */
class Elements extends Model
{
    /**
     * @var string The database table name
     */
    protected $table = 'babel_elements';

    /**
     * @var string The database table primary key
     */
    protected $primaryKey = 'element_id';

    protected $fillable = [ 'name', 
                              'title_text', 
                              'subtitle_text', 
                              'content_text', 
                              'comment_text', 
                              'type', 
                              'click_url', 
                              'element_image', 
                              'element_images', 
                              'element_images_info',  
                              'steps',    
                              'steps_background',                        
                              'status'
                            ];

    public $relation = [
        'belongsTo' => [
            'language' => 'System\Models\Languages_model',
        ],
    ];

    public $casts = [
        'image_code' => 'serialize',
        'element_images' => 'serialize',
        'element_images_info' => 'serialize',  
        'steps' => 'serialize',   
        'language_id' => 'integer',
        'status' => 'boolean',
    ];

    //
    // Accessors & Mutators
    //

    public function getTypeLabelAttribute()
    {
        return ucwords($this->type);
    }

    //
    // Scopes
    //

    public function scopeIsEnabled($query)
    {
        return $query->where('status', 1);
    }

    //
    // Helpers
    //

    public function getLanguageIdOptions()
    {
        return $this->dropdown('name');
    }

    public function getImageThumb($options = [])
    {
        $defaults = ['name' => 'no_photo.png', 'path' => 'data/no_photo.png', 'url' => $options['no_photo']];

        if (empty($this->image_code))
            return $defaults;

        $image = unserialize($this->image_code);

        if (empty($image['path']))
            return $defaults;

        return $this->getThumbArray($image['path'], 120, 120);
    }

    public function getCarouselThumbs($options = [])
    {
        $defaults = [];

        if (empty($this->image_code))
            return $defaults;

        $image = unserialize($this->image_code);

        if (!is_array($image['paths']))
            return $defaults;

        foreach ($image['paths'] as $path) {
            $images[] = $this->getThumbArray($path, 120, 120);
        }

        return $images;
    }

    public function getThumbArray($file_path, $width = 120, $height = 120)
    {
        return [
            'name' => basename($file_path),
            'path' => $file_path,
            'url' => Image_tool_model::resize($file_path, $width, $height),
        ];
    }
    
}
