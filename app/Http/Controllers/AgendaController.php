<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Http\Requests;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $agendas = Agenda::orderBy('titlu','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('agendas.list',compact('agendas'))->with('i',$value);
    }

    public function create()
    {
        return view('agendas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titlu' => 'required',
            'descriere' => 'required',
            'data' => 'required',
            'locatie' => 'required',
            'tip'=>'required',
            'pret'=>'required',
            'disponibilitate' =>'required', 
            'speaker' => 'required',
            'sponsor' => 'required',
            'partener' => 'required']);
        Agenda::create($request->all());
        return redirect()->route('agendas.index')->with('success', 'Your details added successfully!');
    }
    
    public function show($id)
    {
        $agenda = Agenda::find($id);
        return view('agendas.show',compact('agenda'));
    }
    
    public function edit($id)
    {
        $agenda = Agenda::find($id);
        return view('agendas.edit',compact('agenda'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titlu' => 'required',
            'descriere' => 'required',
            'data' => 'required',
            'locatie' => 'required',
            'tip'=>'required',
            'pret'=>'required',
            'disponibilitate' =>'required',
            'speaker' => 'required',
            'sponsor' => 'required',
            'partener' => 'required']);
            Agenda::find($id)->update($request->all());
            return redirect()->route('agendas.index')->with('success','Details updated successfully');
    }
    
    public function destroy($id)
    {
        Agenda::find($id)->delete();
        return redirect()->route('agendas.index')->with('success','Details removed successfully');
    }
}
