<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Http\Requests;

class SpeakerController extends Controller
{
    public function index(Request $request)
    {
        $speakers = Speaker::orderBy('nume','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('speakers.list', compact('speakers'))->with('i',$value);
    }

    public function create()
    {
        return view('speakers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['nume'=>'required']);
        // create new speaker
        Speaker::create($request->all());
        return redirect()->route('speakers.index')->with('success', 'Your speaker added successfully!');
    }

    public function show($id)
    {
        $speaker = Speaker::find($id);
        return view('speakers.show',compact('speaker'));
    }
    
    public function edit($id)
    {
        $speaker = Speaker::find($id);
        return view('speakers.edit',compact('speaker'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nume' => 'required']);
            Speaker::find($id)->update($request->all());
            return redirect()->route('speakers.index')->with('success','Speaker updated successfully');
    }
    
    public function destroy($id)
    {
        Speaker::find($id)->delete();
        return redirect()->route('speakers.index')->with('success','Speaker removed successfully');
    }
}

