<?php namespace App\Http\Controllers\Blog;

use App\Category;
use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;

class ClinicController extends Controller {

    public function getHome($id,$categoryId = null)
    {
        $categories = Clinic::find($id)->categories()->getResults();
        if (!is_null($categoryId)) {
            $posts = Post::where('category_id','=',$categoryId)->paginate(5);
        } else {
            $posts = null;
        }
        return view('blog.home')
            ->with('clinic',Clinic::find($id))
            ->with('categories',$categories)
            ->with('categoryId',$categoryId)
            ->with('posts',$posts);
    }



}
