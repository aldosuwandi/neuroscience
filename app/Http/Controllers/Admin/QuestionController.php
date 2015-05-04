<?php namespace App\Http\Controllers\Admin;
use App\Clinic;
use App\Http\Requests;
use App\Question;

class QuestionController extends AdminController {

    public function getIndex($clinicId = null)
    {
        return $this->getList($clinicId);
    }

    public function getList($clinicId = null)
    {
        $clinics = Clinic::all();
        $questions = array();
        if (!is_null($clinicId)) {
            $questions = Question::where('clinic_id','=',$clinicId)
                ->orderBy('published')->paginate(10);
        }
        return view('admin.question.list')
            ->with('clinics',$clinics)
            ->with('clinicId',$clinicId)
            ->with('questions',$questions);
    }

    public function getCreate($id)
    {
        $question = Question::find($id);
        return view('admin.question.form')->with('question',$question);
     }


    public function getDelete($id)
    {
        Question::find($id)->delete();
        return $this->getList();
    }

    public function postEdit(CreateAnswerRequest $request)
    {

    }


}
