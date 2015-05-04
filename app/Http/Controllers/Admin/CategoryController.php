<?php namespace App\Http\Controllers\Admin;
use App\Category;
use App\Clinic;
use App\Http\Requests\CreateClinicRequest;
use Illuminate\Http\Request;

class CategoryController extends AdminController {

    public function getIndex($clinicId = null)
    {
        return $this->getList($clinicId);
    }

    public function getList($clinicId = null)
    {
        $clinics = Clinic::all();
        $categories = array();
        if (!is_null($clinicId)) {
            $categories = Clinic::find($clinicId)->categories()->getResults();
        }
        return view('admin.category.list')
            ->with('clinics',$clinics)
            ->with('clinicId',$clinicId)
            ->with('categories',$categories);
    }

    public function getCreate()
    {
        $category = new Category();
        return view('admin.category.form')->with('category',$category);
    }


    public function postCreate(CreateCategotyRequest $request)
    {
        Category::create($request->all());
        return $this->getList($request->input('clinicId'));
    }

    public function getDelete($id)
    {
        Category::find($id)->delete();
        return $this->getList();
    }

    public function postEdit(CreateCategoryRequest $request)
    {

    }



}
