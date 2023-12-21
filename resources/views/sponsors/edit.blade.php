@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"> Modificare informatii sponsori</div>
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
    {!! Form::model($sponsor, ['method' => 'PATCH','route' =>['sponsors.update', $sponsor->id]]) !!}
    <div class="form-group">
        <label for="nume">Nume</label>
        <input type="string" name="nume" class="form-control" value="{{$sponsor->nume}}">
    </div>

    <div class="form-group">
        <input type="submit" value="Salvare Modificari" class="btn btn-info">
        <a href="{{route('sponsors.index') }}" class="btn btndefault">Cancel</a>
    </div>
    {!! Form::close() !!}
 </div>
</div>
@endsection