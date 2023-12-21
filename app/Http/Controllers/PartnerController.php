<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Http\Requests;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $partners = Partner::orderBy('nume','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('partners.list',compact('partners'))->with('i',$value);

    }
    public function create()
    {
        return view('partners.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, ['nume'=>'required']);
        // create new partner
        Partner::create($request->all());
        return redirect()->route('partners.index')->with('success', 'Your partner added successfully!');
    }

    public function show($id)
    {
        $partner = Partner::find($id);
        return view('Partners.show',compact('partner'));
    }
    
    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('Partners.edit',compact('partner'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nume' => 'required',
            ]);
            Partner::find($id)->update($request->all());
            return redirect()->route('partners.index')->with('success','Partner updated successfully');
    }
    
    public function destroy($id)
    {
        Partner::find($id)->delete();
        return redirect()->route('partners.index')->with('success','Partner removed successfully');
    }
}