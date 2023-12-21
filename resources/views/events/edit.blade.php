@extends('layouts.app')
@section('content')
 <div class="panel panel-default">
 <div class="panel-heading"> Modificare informatii evenimente</div>
 <div class="panel-body">
<!--exista inregistrari in tabelul event-->
 @if (count($errors) > 0)
 <div class="alert alert-danger">
 <strong>Eroare:</strong>
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
 @endif
<!--populez campurile formularului cu datele aferente din tabela event -->
{!! Form::model($event, ['method' => 'PATCH','route' =>
['events.update', $event->id]]) !!}
<div class="form-group">
<label for="titlu">Titlu</label>
<input type="string" name="titlu" class="form-control" 
value="{{$event->titlu }}">
</div>
<div class="form-group">
<label for="descriere">Descriere</label>
<textarea name="descriere" class="form-control" 
rows="3">{{$event->descriere }}</textarea>
</div>
<div class="form-group">
<label for="data">Data</label>
<input type="dateTime" name="data" class="form-control" 
value="{{$event->data }}">
</div>
<div class="form-group">
<label for="locatie">Locatie</label>
<input type="string" name="locatie" class="form-control" 
value="{{$event->locatie }}">
</div>
 <div class="form-group">
 <input type="submit" value="Salvare Modificari" class="btn 
btn-info">
 <a href="{{route('events.index') }}" class="btn btn-default">Cancel</a>
 </div>
 {!! Form::close() !!}
 </div>
 </div>
@endsection
