<?php namespace App\Http\Controllers\Admin;
use App\Clinic;
use App\Http\Requests;
use App\Question;
use Laracasts\Flash\Flash;

class QuestionController extends AdminController {

    public function getIndex($clinicId = null)
    {
        return $this->getList($clinicId);
    }

    public function getList($clinicId = null)
    {
        $clinics = Clinic::all();
        if (is_null($clinicId)) {
            $clinicId = 1;
        }
        $questions = Question::where('clinic_id','=',$clinicId)
            ->orderBy('published')->paginate(10);
        $clinic = Clinic::find($clinicId);
        Flash::info('Ada mempunyai '.$clinic->unAnswered().' pertanyaan yang belum dijawab');
        return view('admin.question.list')
            ->with('clinics',$clinics)
            ->with('clinicId',$clinicId)
            ->with('clinic',$clinic)
            ->with('questions',$questions);
    }

    public function getEdit($id)
    {
        $question = Question::find($id);
        return view('admin.question.form')->with('question',$question);
     }


    public function getDelete($id)
    {
        $question = Question::find($id);
        $clinicId = $question->clinic->id;
        $question->delete();
        Flash::success('Pertanyaan telah dihapus');
        return redirect('/admin/question/list/'.$clinicId);
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
        Flash::success('Pertanyaan telah dijawab');
        return redirect('/admin/question/list/'.$question->clinic->id);
    }


}
