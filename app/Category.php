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

    public static function create(array $attributes)
    {
        $attributes['slug'] = str_slug($attributes['name']);
        parent::create($attributes);
    }

}