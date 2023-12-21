@extends('layouts.app')
@section('content')
 <div class="panel panel-default">
 <div class="panel-heading">Adaugă eveniment nou</div>
 <div class="panel-body">
@if (count($errors) > 0)
 <div class="alert alert-danger">
 <strong>Errors:</strong>
 <ul>
@foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
 {{ Form::open(array('route' => 'agendas.store','method'=>'POST')) }}
<div class="form-group">
<label for="titlu">Titlu</label>
<input type="string" name="titlu" class="form-control" 
value="{{old('titlu') }}">
</div>
<div class="form-group">
<label for="descriere">Descriere</label>
<textarea name="descriere" class="form-control" 
rows="3">{{old('descriere') }}</textarea>
</div>
<div class="form-group">
<label for="data">Data</label>
<input type="dateTime" name="data" class="form-control" 
value="{{old('data') }}">
</div>
<div class="form-group">
<label for="locatie">Locatie</label>
<input type="string" name="locatie" class="form-control" 
value="{{old('locatie') }}">
</div>
<div class="form-group">
<label for="tip">Tip</label>
<input type="string" name="tip" class="form-control" value="{{old('tip')}}">
</div>
<div class="form-group">
<label for="pret">Pret</label>
<input type="string" name="pret" class="form-control" value="{{old('pret')}}">
</div>
<div class="form-group">
<label for="disponibilitate">Disponibilitate</label>
<input type="string" name="disponibilitate" class="form-control" value="{{old('disponibilitate')}}">
</div>
<div class="form-group">
<label for="speaker">Speaker</label>
<input type="string" name="speaker" class="form-control" value="{{old('speaker')}}">
</div>
<div class="form-group">
<label for="sponsor">Sponsor</label>
<input type="string" name="sponsor" class="form-control" value="{{old('sponsor')}}">
</div>
<div class="form-group">
<label for="partener">Partener</label>
<input type="string" name="partener" class="form-control" value="{{old('partener')}}">
</div>
<div class="form-group">
<input type="submit" value="Adauga Eveniment" class="btn btn-info">
<a href="{{ route('agendas.index') }}" class="btn btndefault">Cancel</a>
</div>
 {{ Form::close() }}
</div>
</div>
@endsection
