<?php namespace App\Http\Controllers\Blog;

use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Question;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class QuestionController extends Controller {

    public function getList($clinicId,$clinicSlug = null)
    {
        $clinic = Clinic::find($clinicId);
        if ($clinicSlug == null) {
            return redirect ('/question/'.$clinic->id.'/'.$clinic->slug);
        }
        $questions = Question::where('clinic_id','=',$clinicId)
            ->where('published','=',true)
            ->orderBy('created_at','desc')
            ->paginate(10);
        $categories = \Cache::rememberForever('categories_'.$clinicId, function() use ($clinicId)
        {
            return Clinic::find($clinicId)->categories;
        });
        return view('blog.qa.question')
            ->with('categoryId',null)
            ->with('clinic',$clinic)
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
                ->with('clinic',$clinic)
                ->with('question',$question)
                ->with('categories',$categories);
        }

    }

    public function getSearch(Request $request)
    {
        $text = $request->input('text');
        $clinic = Clinic::find($request->input('id'));
        if (trim($text) != '') {
            $questions = Question::where('clinic_id','=',$clinic->id)
                ->where(function($query) use ($text) {
                    $query->where('question_title','LIKE','%'.$text.'%')
                        ->orWhere('question_text','LIKE','%'.$text.'%');
                })
                ->paginate(10);
            $id = $clinic->id;
            $categories = \Cache::rememberForever('categories_'.$clinic->id, function() use ($id)
            {
                return Clinic::find($id)->categories;
            });
            return view('blog.qa.question')
                ->with('text',$text)
                ->with('categoryId',null)
                ->with('clinic',$clinic)
                ->with('categories',$categories)
                ->with('questions',$questions);
        } else {
            return redirect('/question/list/'.$clinic->id.'/'.$clinic->slug);
        }
    }

}
