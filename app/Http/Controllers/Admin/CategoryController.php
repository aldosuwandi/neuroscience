<?php namespace App\Http\Controllers\Admin;
use App\Category;
use App\Clinic;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CategoryController extends AdminController {

    public function getIndex($clinicId = null)
    {
        return $this->getList($clinicId);
    }

    public function getList($clinicId = null)
    {
        $clinics = Clinic::all();
        if (count($clinics) == 0) {
            Flash::error('Harap buat clinic terlebih dahulu');
            return redirect('/admin/clinic');
        } else {
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
    }

    public function getCreate($id = null)
    {
        $clinics = array();
        if(!is_null($id)) {
            $category = Category::find($id);

            $clinicId = $category->clinic->id;
        } else {
            $category = new Category();
            $clinics = Clinic::all();
            $clinicId = null;
        }
        return view('admin.category.form')
            ->with('category',$category)
            ->with('clinics',$clinics)
            ->with('clinicId',$clinicId);
    }


    public function postCreate(CreateCategoryRequest $request)
    {
        Category::create($request->all());
        \Cache::forever('categories_'.$request->input('clinic_id'),
            Clinic::find($request->input('clinic_id'))->categories);
        Flash::success('Category baru telah dibuat');
        return redirect('admin/category/list/'.$request->input('clinic_id'));
    }

    public function getDelete($id)
    {
        $clinicId = Category::find($id)->clinic->id;
        Category::find($id)->delete();
        \Cache::forever('categories_'.$clinicId,Clinic::find($clinicId)->categories);
        Flash::success('Category telah dihapus');
        return redirect('admin/category/list/'.$clinicId);
    }

    public function postEdit(Request $request)
    {
        $category = Category::find($request->input('id'));
        $category->name = $request->input('name');
        $category->slug = str_slug($request->input('name'));
        $category->save();
        \Cache::forever('categories_'.$request->input('clinicId'),
            Clinic::find($request->input('clinicId'))->categories);
        Flash::success('Category telah diperbaharui');
        return redirect('admin/category/list/'.$request->input('clinicId'));
    }



}
