@extends('layouts.app')
@section('content')
 <div class="panel panel-default">
    <div class="panel-heading">
        View Speaker
    </div>
    <div class="panel-body">
    <div class="pull-right">
        <a class="btn btn-default" href="{{ route('speakers.index')}}">Inapoi</a>
    </div>
    <div class="form-group">
        <strong>Nume: </strong> {{$speaker->nume}}
    </div>
    </div>
 </div>
@endsection