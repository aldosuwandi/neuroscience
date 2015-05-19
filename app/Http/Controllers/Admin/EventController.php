<?php namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;


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

    public function getCreate($id = null)
    {
        if (is_null($id)) {
            $event = new Event();
        } else {
            $event = Event::find($id);
        }
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
        Flash::success('Event baru telah dibuat');
        return redirect('/admin/event');
    }
    
    public function postEdit(Request $request)
    {
        $event = Event::find($request->input('id'));
        if ($request->hasFile('image')) {
            $destinationPath = 'uploads';
            $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $fileName);
            $event->img_url = $fileName;
        }
        $event->name = $request->input('name');
        $event->text = $request->input('text');
        $event->save();
        Flash::success('Event telah diperbaharui');
        return redirect('/admin/event/list');
    }

    public function getDelete($id)
    {
        Event::find($id)->delete();
        Flash::success('Event telah dihapus');
        return redirect('/admin/event/list');
    }

    public function getActivate($id)
    {
        $events = Event::all();
        $count = 0;
        foreach($events as $event) {
            if ($event->active) {
                $count++;
            }
        }
        if ($count == 1) {
            Flash::error('Hanya boleh 1 event yang aktif');
        } else {
            $event = Event::find($id);
            $event->active = true;
            $event->save();
            Flash::success('Event telah diaktifkan');
        }
        return redirect('/admin/event');
    }

    public function getDeactivate($id)
    {
        $event = Event::find($id);
        $event->active = false;
        $event->save();
        Flash::success('Event telah dinonaktifkan');
        return redirect('/admin/event');
    }

}
