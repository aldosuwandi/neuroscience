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
        $destinationPath = 'uploads';
        $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
        Event::create([
            'name' => $request->input('name'),
            'img_url' => $fileName,
            'text' => $request->input('text'),
            'active' => false
        ]);
        $request->file('image')->move($destinationPath, $fileName);
        return redirect('/admin/event');
    }

    public function getDelete($id)
    {
        Event::find($id)->delete();
        return $this->getList();
    }

    public function getActivate($id)
    {
        $event = Event::find($id);
        $event->active = true;
        $event->save();
        return redirect('/admin/event');
    }

    public function getDeactive($id)
    {
        $event = Event::find($id);
        $event->active = false;
        $event->save();
        return redirect('/admin/event');
    }

}
