<?php namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;
use App\Clinic;


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

    public function getCreate($clinicId = null)
    {
        $post = new Post();
        $clinics = Clinic::all();
        $categories = array();
        if (!is_null($clinicId)) {
            $categories = Clinic::find($clinicId)->categories()->getResults();
        }
        return view('admin.post.form')
            ->with('post', $post)
            ->with('clinics', $clinics)
            ->with('clinicId', $clinicId)
            ->with('categories', $categories);
    }

    public function postCreate(Requests\CreatePostRequest $request)
    {
        Post::create([
            'category_id' => $request->input('category_id'),
            'creator' => $request->input('creator'),
            'title' => $request->input('title'),
            'text' => $this->parseImageAndTransformText($request->input('text'))
        ]);
        return redirect('admin/post/list/' . $request->input('clinicId') . '/' . $request->input('categoryId'));
    }

    public function getDelete($id)
    {
        Post::find($id)->delete();
        return $this->getList();
    }

    public function postEdit(Requests\CreatePostRequest $request)
    {

    }

    private function parseImageAndTransformText($text)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML($text);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $src = $image->getAttribute('src');
            $x = explode(';base64,',$src);
            $data = base64_decode($x[1]);
            $im = imagecreatefromstring($data);
            $filename = 'post/'.uniqid('img_').'.png';
            imagepng($im,$filename);
            $newImage = $dom->createElement('img');
            $newImage->setAttribute('src',url().'/'.$filename);
            $image->parentNode->replaceChild($newImage,$image);
        }
        $html = str_get_html($dom->saveHTML());
        return $html->find('body', 0)->innertext;
    }


}
