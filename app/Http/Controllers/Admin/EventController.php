<?php namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;

class EventController extends AdminController {

    public function getIndex()
    {
        return $this->getList();
    }

    public function getList()
    {
        $events = Event::all();
        return view('admin.event.list')->with('events',$events);
    }

    public function getCreate()
    {
        $event = new Event();
        return view('admin.event.form')->with('event',$event);
    }

    public function postCreate(CreateHomeRequest $request)
    {
        Event::create($request->all());
        return $this->getList();
    }

    public function getDelete($id)
    {
        Event::find($id)->delete();
        return $this->getList();
    }

}
