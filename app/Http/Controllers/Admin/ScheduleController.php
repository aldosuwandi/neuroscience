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

    public function getCreate($id = null)
    {
        if (is_null($id)) {
            $schedule = new Schedule();
        } else {
            $schedule = Schedule::find($id);
        }
        return view('admin.schedule.form')->with('schedule',$schedule);
    }

    public function postCreate(Requests\CreateScheduleRequest $request)
    {
        Schedule::create($request->all());
        return redirect('admin/schedule');
    }

    public function getDelete($id)
    {
        Schedule::find($id)->delete();
        return redirect('/admin/schedule/list');
    }

    public function postEdit(Requests\CreateScheduleRequest $request)
    {
        $schedule = Schedule::find($request->input('id'));
        $schedule->name = $request->input('name');
        $schedule->clinic = $request->input('clinic');
        $schedule->day = $request->input('day');
        $schedule->time = $request->input('time');
        $schedule->save();
        return redirect('/admin/schedule/list');
    }


}
