<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model {

    protected $table = 'home';

    protected $fillable = ['title','link','caption','img_url'];

}
