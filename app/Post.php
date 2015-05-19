<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['category_id','creator','title','img_url','text','slug'];

    public function category()
    {
        return $this->hasOne('App\Category','id','category_id');
    }

    public static function create(array $attributes)
    {
        $attributes['slug'] = str_slug($attributes['title']);
        parent::create($attributes);
    }
}