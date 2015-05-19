<?php namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;

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

}
