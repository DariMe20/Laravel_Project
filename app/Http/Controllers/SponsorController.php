<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Http\Requests;

class SponsorController extends Controller
{
    public function index(Request $request)
    {
        $sponsors = Sponsor::orderBy('nume','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('sponsors.list', compact('sponsors'))->with('i',$value);
    }

    public function create()
    {
        return view('sponsors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['nume'=>'required']);
        // create new sponsor
        Sponsor::create($request->all());
        return redirect()->route('sponsors.index')->with('success', 'Your sponsor added successfully!');
    }

    public function show($id)
    {
        $sponsor = Sponsor::find($id);
        return view('sponsors.show',compact('sponsor'));
    }
    
    public function edit($id)
    {
        $sponsor = Sponsor::find($id);
        return view('sponsors.edit',compact('sponsor'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, ['nume' => 'required']);
            Sponsor::find($id)->update($request->all());
            return redirect()->route('sponsors.index')->with('success','Sponsor updated successfully');
    }
    
    public function destroy($id)
    {
        Sponsor::find($id)->delete();
        return redirect()->route('sponsors.index')->with('success','Sponsor removed successfully');
    }
}

