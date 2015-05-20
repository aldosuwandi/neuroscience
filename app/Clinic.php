<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table = 'clinic';

    protected $fillable = ['name','description','img_url','slug'];

    public function categories()
    {
        return $this->hasMany('App\Category','clinic_id','id');
    }

    public function questions()
    {
        return $this->hasMany('App\Question','clinic_id','id');
    }

    public function unAnswered()
    {
        return Question::where('clinic_id','=',$this->id)
            ->where('published','=',false)->count();
    }

    public static function create(array $attributes)
    {
        $attributes['slug'] = str_slug($attributes['name']);
        parent::create($attributes);
    }

}