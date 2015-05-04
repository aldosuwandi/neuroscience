<?php namespace App\Http\Controllers\Blog;

use App\Category;
use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class ClinicController extends Controller {

    public function getIndex($id,$categoryId = null)
    {
        $categories = Clinic::find($id)->categories();
        if (!is_null($categoryId)) {
            $posts = Category::find($categoryId)->posts();
        } else {
            $posts = $categories[0]->posts();
            $categoryId = $categories[0]->id;
        }
        return view('blog.home')
            ->with('categories',$categories)
            ->with('categoryId',$categoryId)
            ->with('posts',$posts);
    }

}
