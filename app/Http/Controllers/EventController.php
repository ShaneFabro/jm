<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Category;

class EventController extends Controller
{
    public function event()
    {
        $latest_event = Announcement::orderBy('created_at', 'desc')->take(1)->get();
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(7);
        $categories = Category::all();
        return view('home.events.event', compact('announcements', 'categories','latest_event'));
        
    }
    public function sortevent($id)
    {
        $announcements = Announcement::where('category_id', $id)->paginate(9);
        $count = $announcements->count();
        $categories = Category::all();
        $category_name = Category::findOrFail($id)->category_name;
        return view('home.events.eventsort', compact('announcements', 'categories','count', 'category_name'));
        
    }
    public function eventview($id)
    {
       $announcements = Announcement::findOrFail($id);
       $next = Announcement::where('id', '>' , $announcements->id)->min('id');
       $previous = Announcement::where('id', '<' , $announcements->id)->max('id');
       $randoms = Announcement::where('id', '!=', $id)->inRandomOrder()->take(6)->get();
        return view('home.events.eventview',compact('announcements','randoms', 'next', 'previous'));
        
    }
    public function searchevent(Request $request)
    {
        $event = $request->input('searchevent');
        $announcements = Announcement::with(['category' => function($query) use ($event){
            $query->where('category_name', 'like', '%' . $event. '%')->paginate(9);
       }])->where('title', 'like', '%' . request('searchevent') . '%')->paginate(9);
        // $announcementss = Announcement::find(1);
        // $category = $announcementss->category;
        $categories = Category::all();
        $count = $announcements->count();
       
        return view('home.events.eventssearch', compact('announcements', 'categories','event', 'category','event'));
        
    }
}
