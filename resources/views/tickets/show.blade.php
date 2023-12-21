@extends('layouts.app')
@section('content')
 <div class="panel panel-default">
    <div class="panel-heading">
        View Ticket
    </div>
    <div class="panel-body">
    <div class="pull-right">
        <a class="btn btn-default" href="{{ route('tickets.index')}}">Inapoi</a>
    </div>
    <div class="form-group">
        <strong>Tip: </strong> {{$ticket->tip}}
    </div>
    <div class="form-group">
        <strong>Pret: </strong> {{$ticket->pret}}
    </div>
    <div class="form-group">
        <strong>Disponibilitate: </strong> {{$ticket->disponibilitate}}
    </div>
    </div>
 </div>
@endsection