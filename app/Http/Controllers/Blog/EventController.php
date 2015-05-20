<?php namespace App\Http\Controllers\Blog;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class EventController extends Controller {

    public function getIndex()
    {
        $events = Event::paginate(10);
        return view('blog.event.home')->with('events',$events);
    }

    public function getView($id,$eventSlug = null)
    {
        if (is_null($eventSlug)) {
            return redirect('/events/view/'.$id.'/'.$eventSlug);
        } else {
            $event = Event::find($id);
            return view('blog.event.post')->with('event',$event);
        }
    }
}
