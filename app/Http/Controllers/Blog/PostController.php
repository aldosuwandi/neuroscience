<?php namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;

class PostController extends Controller {

    public function getView($id)
    {
        $post = Post::find($id);
        $clinic = $post->category()->getResults()->clinic()->getResults();
        $categories = $clinic->categories()->getResults();
        return view('blog.post')
            ->with('post',$post)
            ->with('clinic',$clinic)
            ->with('categories',$categories);
    }

}
