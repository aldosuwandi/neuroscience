<?php namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;
use App\Clinic;


class PostController extends AdminController {


    public function getIndex()
    {
        return $this->getList();
    }

    public function getList($clinicId = null,$categoryId = null)
    {
        $clinics = Clinic::all();
        $categories = array();
        $posts = array();
        if (!is_null($clinicId)) {
            $categories = Clinic::find($clinicId)->categories()->getResults();
        }
        if (!is_null($categoryId)) {
            $posts = Post::where('category_id','=',$categoryId)->paginate(10);
        }
        return view('admin.post.list')
            ->with('clinics',$clinics)
            ->with('clinicId',$clinicId)
            ->with('categories',$categories)
            ->with('categoryId',$categoryId)
            ->with('posts',$posts);
    }

    public function getCreate()
    {
        $post = new Post();
        return view('admin.post.form')->with('post',$post);
    }

    public function postCreate(CreatePostRequest $request)
    {
        Post::create($request->all());
        return $this->getList($request->input('clinicId'),$request->input('categoryId'));
    }

    public function getDelete($id)
    {
        Post::find($id)->delete();
        return $this->getList();
    }

    public function postEdit(CreatePostRequest $request)
    {

    }


}
