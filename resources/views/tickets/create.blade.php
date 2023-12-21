@extends('layouts.app')
@section('content')
 <div class="panel panel-default">
 <div class="panel-heading">Adaugă bilet nou</div>
 <div class="panel-body">
@if (count($errors) > 0)
 <div class="alert alert-danger">
 <strong>Errors:</strong>
 <ul>
@foreach ($errors->all() as $error)
 <li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
 {{ Form::open(array('route' =>'tickets.store','method'=>'POST')) }}
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
<input type="submit" value="Adauga bilet" class="btn btn-info">
<a href="{{route('tickets.index')}}" class="btn btndefault">Cancel</a>
</div>
 {{ Form::close() }}
</div>
</div>
@endsection
