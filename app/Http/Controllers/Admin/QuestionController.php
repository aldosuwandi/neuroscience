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
            ->with('clinic',Clinic::find($clinicId))
            ->with('questions',$questions);
    }

    public function getEdit($id)
    {
        $question = Question::find($id);
        return view('admin.question.form')->with('question',$question);
     }


    public function getDelete($id)
    {
        Question::find($id)->delete();
        return $this->getList();
    }

    public function postEdit(Requests\CreateAnswerRequest $request)
    {
        $question = Question::find($request->input('id'));
        $question->questioner = $request->input('questioner');
        $question->question_title = $request->input('question_title');
        $question->question_text = $request->input('question_text');
        $question->answering = $request->input('answering');
        $question->answer_text = $request->input('answer_text');
        $question->published = true;
        $question->save();
        return redirect('/admin/question/list/'.$question->clinic->id);
    }


}
