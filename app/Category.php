<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['clinic_id','name','slug'];

    public function posts()
    {
        return $this->hasMany('App\Post','category_id','id');
    }

    public function clinic()
    {
        return $this->hasOne('App\Clinic','id','clinic_id');
    }

    public function getPosts()
    {
        $posts = \Cache::rememberForever('posts_'.$this->id, function()
        {
            return Post::where('category_id','=',$this->id)->get();
        });
        return $posts;
    }

    public static function create(array $attributes)
    {
        $attributes['slug'] = str_slug($attributes['name']);
        parent::create($attributes);
    }

}