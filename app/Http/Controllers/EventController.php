<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\Partner;
use App\Models\Sponsor;


class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::orderBy('id','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('events.list',compact('events'))->with('i',$value);
    }

    public function create()
    {
	 $speakers = Speaker::all();
         $partners = Partner::all(); 
	 return view('events.create', compact('speakers', 'partners'));
       
    }

    public function store(Request $request)
    {
        $this->validate($request, ['titlu' => 'required','descriere' => 
'required','data' => 'required','locatie' => 'required']);
        // create new event
        $event = Event::create($request->all());
	$event->speakers()->sync($request->speakers);
    	$event->partners()->sync($request->partners);
        return redirect()->route('events.index')->with('success', 'Your event 
added successfully!');
    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show',compact('event'));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit',compact('event'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['titlu' => 'required','descriere' => 'required',
'data' => 'required','locatie' => 'required']);
        Event::find($id)->update($request->all());
        return redirect()->route('events.index')->with('success','Event updated 
successfully!');  
    }

    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('events.index')->with('success','Event
removed successfully!');
    }

public function showSpeakers(Event $event)
{
    $allSpeakers = Speaker::all();
    return view('events.manage_speakers', compact('event', 'allSpeakers'));
}

public function addSpeaker(Request $request, Event $event)
{
    $speakerId = $request->input('speaker_id');

    // Verificăm dacă speakerul este deja programat în aceeași zi
    $existingEvent = Event::where('data', $event->data)
        ->whereHas('speakers', function ($query) use ($speakerId) {
            $query->where('speaker_id', $speakerId);
        })
        ->first();

    if ($existingEvent) {
        return back()->withErrors(['error' => 'Speakerul este deja programat pentru un alt eveniment în aceeași zi.']);
    }

    // Dacă nu există conflict, atașăm speakerul la eveniment
    $event->speakers()->attach($speakerId);
    return back()->with('success', 'Speakerul a fost adăugat cu succes la eveniment.');
}


public function removeSpeaker(Event $event, $speakerId)
{
    $event->speakers()->detach($speakerId);
    return back();
}
public function showSponsors(Event $event)
{
    $allSponsors = Sponsor::all();
    return view('events.manage_sponsors', compact('event', 'allSponsors'));
}

public function addSponsor(Request $request, Event $event)
{
    $sponsorId = $request->input('sponsor_id');
    $event->sponsors()->attach($sponsorId);
    return back();
}

public function removeSponsor(Event $event, $sponsorId)
{
    $event->sponsors()->detach($sponsorId);
    return back();
}
public function showPartners(Event $event)
{
    $allPartners = Partner::all();
    return view('events.manage_partners', compact('event', 'allPartners'));
}

public function addPartner(Request $request, Event $event)
{
    $partnerId = $request->input('partner_id');
    $event->partners()->attach($partnerId);
    return back();
}

public function removePartner(Event $event, $partnerId)
{
    $event->partners()->detach($partnerId);
    return back();
}

}

