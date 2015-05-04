<?php namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends AdminController {

    public function getIndex()
    {
        return $this->getList();
    }

    public function getList()
    {
        $schedules = Schedule::orderBy('name')->paginate(10);
        return view('admin.schedule.list')->with('schedules',$schedules);
    }

    public function getCreate()
    {
        $schedule = new Schedule();
        return view('admin.schedule.form')->with('schedule',$schedule);
    }

    public function postCreate(CreateScheduleRequest $request)
    {
        Schedule::create($request->all());
        return $this->getList();
    }

    public function getDelete($id)
    {
        Schedule::find($id)->delete();
        return $this->getList();
    }

    public function postEdit(CreateScheduleRequest $request)
    {

    }


}
