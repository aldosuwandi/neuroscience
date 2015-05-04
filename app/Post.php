<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['category_id','creator','title','image_url','video_url','text'];

    public function category()
    {
        return $this->hasOne('App\Category','id','category_id');
    }

}