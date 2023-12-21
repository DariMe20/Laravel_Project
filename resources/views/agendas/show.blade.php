@extends('layouts.app')
@section('content')
 <div class="panel panel-default">
 <div class="panel-heading">
 View Event
 </div>
 <div class="panel-body">
 <div class="pull-right">
 <a class="btn btn-default" href="{{ route('agendas.index') 
}}">Inapoi</a>
 </div>
 <div class="form-group">
    <strong>Titlu: </strong> {{ $agenda->titlu }}
 </div>
 <div class="form-group">
    <strong>Descriere: </strong> {{$agenda->descriere }}
 </div>
 <div class="form-group">
    <strong>Data: </strong> {{ $agenda->data }}
 </div>
 <div class="form-group">
    <strong>Locatie: </strong> {{ $agenda->locatie }}
 </div>
 <div class="form-group">
        <strong>Tip: </strong> {{$agenda->tip}}
    </div>
    <div class="form-group">
        <strong>Pret: </strong> {{$agenda->pret}}
    </div>
    <div class="form-group">
        <strong>Disponibilitate: </strong> {{$agenda->disponibilitate}}
    </div>
    <div class="form-group">
        <strong>Speaker: </strong> {{$agenda->speaker}}
    </div>
    <div class="form-group">
        <strong>Sponsor: </strong> {{$agenda->sponsor}}
    </div>
    <div class="form-group">
        <strong>Partener: </strong> {{$agenda->partener}}
    </div>
 </div>
 </div>
@endsection
