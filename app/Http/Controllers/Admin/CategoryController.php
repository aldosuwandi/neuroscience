<?php namespace App\Http\Controllers\Admin;
use App\Category;
use App\Clinic;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends AdminController {

    public function getIndex($clinicId = null)
    {
        return $this->getList($clinicId);
    }

    public function getList($clinicId = null)
    {
        $clinics = Clinic::all();
        $categories = array();
        $clinic = null;
        if (!is_null($clinicId)) {
            $categories = Clinic::find($clinicId)->categories()->getResults();
            $clinic = Clinic::find($clinicId);
        }
        return view('admin.category.list')
            ->with('clinic',$clinic)
            ->with('clinics',$clinics)
            ->with('clinicId',$clinicId)
            ->with('categories',$categories);
    }

    public function getCreate()
    {
        $category = new Category();
        $clinics = Clinic::all();
        $clinicId = null;
        return view('admin.category.form')
            ->with('category',$category)
            ->with('clinics',$clinics)
            ->with('clinicId',$clinicId);
    }


    public function postCreate(CreateCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('admin/category/'.$request->input('clinicId'));
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
