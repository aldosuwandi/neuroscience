<?php namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;

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

    public function postCreate(CreateEventRequest $request)
    {
        $destinationPath = 'event';
        $fileName = $request->file('image')->getClientOriginalName();
        Event::create([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'img_url' => $fileName
        ]);
        $request->file('image')->move($destinationPath, $fileName);
        return redirect('/admin/event');
    }

    public function getDelete($id)
    {
        Event::find($id)->delete();
        return $this->getList();
    }

}
