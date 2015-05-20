<?php namespace App\Http\Controllers\Admin;
use App\Category;
use App\Doctor;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;
use App\Clinic;
use Laracasts\Flash\Flash;


class PostController extends AdminController
{


    public function getIndex()
    {
        return $this->getList();
    }

    public function getList($clinicId = null, $categoryId = null)
    {
        $clinics = Clinic::all();
        $categories = array();
        $posts = array();
        $clinic = null;
        $category = null;
        if (!is_null($clinicId)) {
            $categories = Clinic::find($clinicId)->categories()->getResults();
            if (count($categories) == 0) {
                Flash::error('Harap buat category terlebih dahulu di clinic ini');
                return redirect('/admin/category/list/'.$clinicId);
            }
            $clinic = Clinic::find($clinicId);
        }
        if (!is_null($categoryId)) {
            $posts = Post::where('category_id', '=', $categoryId)->paginate(10);
            $category = Category::find($categoryId);
        }
        return view('admin.post.list')
            ->with('clinics', $clinics)
            ->with('clinicId', $clinicId)
            ->with('categories', $categories)
            ->with('categoryId', $categoryId)
            ->with('clinic',$clinic)
            ->with('category',$category)
            ->with('posts', $posts);
    }

    public function getCreate($id = null)
    {
        $clinics = Clinic::all();
        $categories = array();
        $clinicId = null;
        if (!is_null($id)) {
            $post = Post::find($id);
        } else {
            $post = new Post();
        }
        if (\Request::has('clinic')) {
            $categories = Clinic::find(\Request::input('clinic'))->categories;
            if (count($categories) == 0) {
                Flash::error('Harap buat category terlebih dahulu di clinic tersebut');
            }
            $clinicId = \Request::input('clinic');
        }
        return view('admin.post.form')
            ->with('post', $post)
            ->with('creators',Doctor::all())
            ->with('clinics', $clinics)
            ->with('clinicId', $clinicId)
            ->with('categories', $categories);
    }

    public function postCreate(Requests\CreatePostRequest $request)
    {
        $destinationPath = 'uploads';
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $fileName);
        }
        Post::create([
            'category_id' => $request->input('category_id'),
            'creator' => $request->input('creator'),
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'img_url' => $fileName
        ]);
        Flash::success('Post baru telah dibuat');
        return redirect('admin/post/list/' . $request->input('clinic_id') . '/' . $request->input('category_id'));
    }

    public function getDelete($id)
    {
        Post::find($id)->delete();
        Flash::success('Post telah dihapus');
        return redirect('admin/post/list/1/1');
    }

    public function postEdit(Requests\CreatePostRequest $request)
    {
        $post = Post::find($request->input('id'));
        $destinationPath = 'uploads';
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $fileName);
            $post->img_url = $fileName;
        }
        $post->category_id = $request->input('category_id');
        $post->creator = $request->input('creator');
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->slug = str_slug($request->input('title'));
        $post->save();
        Flash::success('Post telah diperbaharui');
        return redirect('admin/post/list/' . $request->input('clinic_id') . '/' . $request->input('category_id'));
    }

}
