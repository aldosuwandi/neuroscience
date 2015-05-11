<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctor';

    protected $fillable = ['name','birthday','institution','address','phone','email','education','experience',
        'organization','training','publication','title','clinic','img_url'];

}