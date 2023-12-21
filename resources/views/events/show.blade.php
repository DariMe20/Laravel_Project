@extends('layouts.app')
@section('content')
 <div class="panel panel-default">
 <div class="panel-heading">
 View Event
 </div>
 <div class="panel-body">
 <div class="pull-right">
 <a class="btn btn-default" href="{{ route('events.index') }}">Inapoi</a>
 </div>
 <div class="form-group">
    <strong>Titlu: </strong> {{ $event->titlu }}
 </div>
 <div class="form-group">
    <strong>Descriere: </strong> {{ $event->descriere }}
 </div>
 <div class="form-group">
    <strong>Data: </strong> {{ $event->data }}
 </div>
 <div class="form-group">
    <strong>Locatie: </strong> {{ $event->locatie }}
 </div>
 </div>

 </div>
@endsection
