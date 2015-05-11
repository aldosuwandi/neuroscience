<?php namespace App\Http\Controllers\Blog;

use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Question;

class QuestionController extends Controller {

    public function getList($clinicId)
    {
        $questions = Question::where('clinic_id','=',$clinicId)
            ->where('published','=',true)
            ->orderBy('created_at','desc')
            ->paginate(10);
        $categories = Clinic::find($clinicId)->categories()->getResults();
        return view('blog.qa.question')
            ->with('clinic',Clinic::find($clinicId))
            ->with('categories',$categories)
            ->with('questions',$questions);
    }

    public function getCreate($clinicId)
    {
        $question = new Question();
        $categories = Clinic::find($clinicId)->categories()->getResults();
        return view('blog.qa.form')
            ->with('clinic',Clinic::find($clinicId))
            ->with('question',$question)
            ->with('categories',$categories);
    }

    public function postCreate(CreateQuestionRequest $request)
    {

    }

    public function getView($clinicId,$questionId)
    {
        $question = Question::find($questionId);
        $categories = Clinic::find($clinicId)->categories()->getResults();
        return view('blog.qa.answer')
            ->with('clinic',Clinic::find($clinicId))
            ->with('question',$question)
            ->with('categories',$categories);
    }

}
