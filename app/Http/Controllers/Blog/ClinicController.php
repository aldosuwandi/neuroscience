<?php namespace App\Http\Controllers\Blog;

use App\Category;
use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;

class ClinicController extends Controller {

    public function getHome($id,$clinicSlug = null,$categorySlug = null)
    {
        $clinic = Clinic::find($id);
        if (is_null($clinicSlug) || $clinic->slug != $clinicSlug) {
            return redirect('clinic/home/'.$id.'/'.$clinic->slug);
        }

        $categoryId = null;

        /**
         * Other Services Treatment
         */
        if ($clinic->name == 'Other Services' && $categorySlug == null) {
            $serviceCategories = $clinic->categories;
            foreach($serviceCategories as $category) {
                if ($category->name == 'Service') {
                    $categoryId = $category->id;
                }
            }
            return redirect('clinic/home/'.$id.'/'.$clinic->slug.'/service');
        }

        $categories = \Cache::rememberForever('categories_'.$id, function() use ($id)
        {
           return Clinic::find($id)->categories;
        });

        if (!is_null($categorySlug)) {
            $categoryId = Category::where('clinic_id','=',$id)->where('slug','=',$categorySlug)->first()->id;
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
