@extends('layouts.app')
@section('content')
 <div class="panel panel-default">
    <div class="panel-heading">
        View partner
    </div>
    <div class="panel-body">
    <div class="pull-right">
        <a class="btn btn-default" href="{{ route('partners.index')}}">Inapoi</a>
    </div>
    <div class="form-group">
        <strong>Nume: </strong> {{$partner->nume}}
    </div>
    </div>
 </div>
@endsection