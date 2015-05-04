<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table = 'clinic';

    protected $fillable = ['name','description'];

    public function categories()
    {
        return $this->hasMany('App\Category','clinic_id','id');
    }

    public function questions()
    {
        return $this->hasMany('App\Question','clinic_id','id');
    }

}