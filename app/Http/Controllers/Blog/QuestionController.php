<?php namespace App\Http\Controllers\Blog;

use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Question;
use Laracasts\Flash\Flash;

class QuestionController extends Controller {

    public function getList($clinicId,$clinicSlug = null)
    {
        if ($clinicSlug == null) {
            return redirect ('/question/'.$clinicId.'/'.Clinic::find($clinicId)->slug);
        }
        $questions = Question::where('clinic_id','=',$clinicId)
            ->where('published','=',true)
            ->orderBy('created_at','desc')
            ->paginate(10);
        $categories = Clinic::find($clinicId)->categories()->getResults();
        return view('blog.qa.question')
            ->with('categoryId',null)
            ->with('clinic',Clinic::find($clinicId))
            ->with('categories',$categories)
            ->with('questions',$questions);
    }

    public function getCreate($clinicId)
    {

        $question = new Question();
        $categories = Clinic::find($clinicId)->categories()->getResults();
        return view('blog.qa.form')
            ->with('categoryId',null)
            ->with('clinic',Clinic::find($clinicId))
            ->with('question',$question)
            ->with('categories',$categories);
    }

    public function postCreate(Requests\CreateQuestionRequest $request)
    {
        $clinic = Clinic::find($request->input('clinic_id'));
        Question::create($request->all());
        Flash::success('Pertanyaan anda sudah terkirim. Terima kasih.');
        return redirect('/question/list/'.$clinic->id.'/'.$clinic->slug);
    }

    public function getView($clinicId,$clinicSlug = null,$questionId,$questionSlug = null)
    {
        $question = Question::find($questionId);
        $clinic = Clinic::find($clinicId);
        if (is_null($clinicSlug) || is_null($questionSlug)) {
            return redirect('/question/view/'.$clinicId.'/'.$clinic->slug.'/'.$questionId.'/'.str_slug($question->question_title));
        } else {
            $categories = Clinic::find($clinicId)->categories()->getResults();
            return view('blog.qa.answer')
                ->with('categoryId',null)
                ->with('clinic',Clinic::find($clinicId))
                ->with('question',$question)
                ->with('categories',$categories);
        }

    }

}
