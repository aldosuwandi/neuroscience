<?php namespace App\Http\Controllers\Blog;

use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Question;

class QuestionController extends Controller {

    public function getIndex($clinicId)
    {
        $questions = Clinic::find($clinicId)->questions();
        $categories = Clinic::find($clinicId)->categories();
        $result = array();
        foreach ($questions as $approvedQuestion) {
            if ($approvedQuestion->published) {
                $result[] = $approvedQuestion;
            }
        }
        return view('blog.qa.question')
            ->with('categories',$categories)
            ->with('questions',$result);
    }

    public function getCreate($clinicId)
    {
        $question = new Question();
        $categories = Clinic::find($clinicId)->categories();
        return view('blog.qa.form')
            ->with('question',$question)
            ->with('categories',$categories);
    }

    public function postCreate(CreateQuestionRequest $request)
    {

    }

    public function getAnswer($questionId,$clinicId)
    {
        $answer = Question::find($questionId);
        $categories = Clinic::find($clinicId)->categories();
        return view('blog.qa.answer')
            ->with('answer',$answer)
            ->with('categories',$categories);
    }

}
