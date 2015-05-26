<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';

    protected $fillable = ['clinic_id','name','link','img_url'];


    public function clinic()
    {
        return $this->hasOne('App\Clinic','id','clinic_id');
    }

}