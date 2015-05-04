<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';

    protected $fillable = ['clinic_id','questioner', 'question_title',
            'question_text','answering','answering_text','published'];

    public function clinic()
    {
        return $this->hasOne('App\Clinic','id','clinic_id');
    }

}