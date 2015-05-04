<?php namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;

class PostController extends Controller {

    public function getIndex($id)
    {
        $post = Post::find($id);
        $clinic = $post->category()->clinic();
        $categories = $clinic->categories();
        return view('blog.post')
            ->with('post',$post)
            ->with('categories',$categories);
    }

}
