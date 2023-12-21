@extends('layouts.app')
@section('content')
 <div class="panel panel-default">
 <div class="panel-heading"> Modificare informatii agenda</div>
 <div class="panel-body">
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
{!! Form::model($agenda, ['method' => 'PATCH','route' =>
['agendas.update', $agenda->id]]) !!}

<div class="form-group">
<label for="titlu">Titlu</label>
<input type="string" name="titlu" class="form-control" 
value="{{$agenda->titlu }}">
</div>
<div class="form-group">
<label for="descriere">Descriere</label>
<textarea name="descriere" class="form-control" 
rows="3">{{$agenda->descriere }}</textarea>
</div>
<div class="form-group">
<label for="data">Data</label>
<input type="dateTime" name="data" class="form-control" 
value="{{$agenda->data }}">
</div>
<div class="form-group">
<label for="locatie">Locatie</label>
<input type="string" name="locatie" class="form-control" 
value="{{$agenda->locatie }}">
</div>
<div class="form-group">
<label for="tip">Tip</label>
<input type="string" name="tip" class="form-control" 
value="{{$agenda->tip}}">
</div>
<div class="form-group">
<label for="pret">Pret</label>
<input type="string" name="pret" class="form-control"
value="{{$agenda->pret}}">
</div>
<div class="form-group">
<label for="disponibilitate">Disponibilitate</label>
<input type="string" name="disponibilitate" class="form-control" 
value="{{$agenda->disponibilitate}}">
</div>
<div class="form-group">
<label for="speaker">Speaker</label>
<input type="string" name="speaker" class="form-control" 
value="{{$agenda->speaker}}">
</div>
<div class="form-group">
<label for="sponsor">Sponsor</label>
<input type="string" name="sponsor" class="form-control" 
value="{{$agenda->sponsor}}">
</div>
<div class="form-group">
<label for="partener">Partener</label>
<input type="string" name="partener" class="form-control" 
value="{{$agenda->partener}}">
</div>
 <div class="form-group">
 <input type="submit" value="Salvare Modificari" class="btn 
btn-info">
 <a href="{{route('agendas.index') }}" class="btn btn-default">Cancel</a>
 </div>
 {!! Form::close() !!}
 </div>
 </div>
@endsection
