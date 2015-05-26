<?php namespace App\Http\Controllers\Blog;

use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function getView($id,$slug = null)
    {
        $post = Post::find($id);
        if (is_null($slug) || $post->slug != $slug) {
            return redirect('/post/view/'.$id.'/'.$post->slug);
        } else {
            $clinic = $post->category()->getResults()->clinic()->getResults();
            $categories = $clinic->categories()->getResults();
            return view('blog.post')
                ->with('post',$post)
                ->with('clinic',$clinic)
                ->with('categoryId',$post->category->id)
                ->with('categories',$categories);
        }
    }

    public function getSearch(Request $request)
    {
        $text = $request->input('text');
        $clinic = Clinic::find($request->input('id'));
        if (trim($text) != '') {
            foreach ($clinic->categories as $category) {
                $clinicCategories[] = $category->id;
            }
            $posts = Post::whereIn('category_id',$clinicCategories)
                ->where(function($query) use ($text) {
                    $query->where('title','LIKE','%'.$text.'%')
                        ->orWhere('text','LIKE','%'.$text.'%');
                })
                ->paginate(10);
            return view('blog.home')
                ->with('clinic',$clinic)
                ->with('categories',$clinic->categories)
                ->with('categoryId',null)
                ->with('text',$text)
                ->with('posts',$posts);
        } else {
            return redirect('/clinic/home/'.$clinic->id.'/'.$clinic->slug);
        }
    }

}
