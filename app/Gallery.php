<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
     protected $table = 'gallery';

     public function images()
     {
       // gallery relation to the image
       return $this->hasMany('App\Image');
     }

}
