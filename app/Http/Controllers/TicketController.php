<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Http\Requests;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $tickets = Ticket::orderBy('tip','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('tickets.list',compact('tickets'))->with('i',$value);
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['tip'=>'required','pret'=>'required','disponibilitate' =>'required']);
        // create new ticket
        Ticket::create($request->all());
        return redirect()->route('tickets.index')->with('success', 'Your ticket added successfully!');
    }
    
    public function show($id)
    {
        $ticket = Ticket::find($id);
        return view('tickets.show',compact('ticket'));
    }
    
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        return view('tickets.edit',compact('ticket'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tip' => 'required',
            'pret' => 'required',
            'disponibilitate' => 'required'
            ]);
            Ticket::find($id)->update($request->all());
            return redirect()->route('tickets.index')->with('success','Ticket updated successfully');
    }
    
    public function destroy($id)
    {
        Ticket::find($id)->delete();
        return redirect()->route('tickets.index')->with('success','Ticket removed successfully');
    }

 public function cart()
 {
 return view('cart');
 }


public function addToCart($id)
{
    $ticket = Ticket::find($id);
    
    if (!$ticket) {
        abort(404);
    }
    
    $cart = session()->get('cart');
    
    // Dacă cart este gol, adăugați primul bilet
    if (!$cart) {
        $cart = [
            $id => [
                "nume" => $ticket->tip,
                "pret" => $ticket->pret,
                'disponibilitate' => $ticket->disponibilitate,
                "quantity" => 1, // Adăugați cantitatea aici
            ]
        ];
        
        session()->put('cart', $cart);
        
        return redirect()->route('cart.index')->with('success', 'Produs adăugat cu succes în coș!');
    }
    
    // Dacă biletul există deja în coș, incrementați cantitatea
    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
        session()->put('cart', $cart);
        
        return redirect()->route('cart.index')->with('success', 'Produs adăugat cu succes în coș!');
    }
    
    // Dacă biletul nu există în coș, adăugați-l cu cantitatea 1
    $cart[$id] = [
        "nume" => $ticket->tip,
        "pret" => $ticket->pret,
        "disponibilitate" => $ticket->disponibilitate,
        "quantity" => 1, // Adăugați cantitatea aici
    ];
    
    session()->put('cart', $cart);
    
    return redirect()->route('cart.index')->with('success', 'Produs adăugat cu succes în coș!');
}


public function update_cart(Request $request)
 {
 if($request->id and $request->quantity)
 {
 $cart = session()->get('cart');
 $cart[$request->id]["quantity"] = $request->quantity;
 session()->put('cart', $cart);
 session()->flash('success', 'Cos modificat cu succes');
 }
 }
 public function remove(Request $request)
 {
 if($request->id) {
 $cart = session()->get('cart');
 if(isset($cart[$request->id])) {
 unset($cart[$request->id]);
 session()->put('cart', $cart);
 }
 session()->flash('success', 'Product sters cu succes!');
 }
 }}
