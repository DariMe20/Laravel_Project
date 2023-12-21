@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
    <div class="panel-heading">
        Lista sponsori
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="pull-right">
                <a href="/sponsors/create" class="btn btn-default">Adaugare sponsor nou</a>
            </div>
        </div>
        <table class="table table-bordered table-stripped">
            <tr>
                <th width="20">No</th>
                <th>Nume</th>
            </tr>
            @if (count($sponsors) > 0)
                @foreach($sponsors as $key => $sponsor)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$sponsor->nume}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('sponsors.show',$sponsor->id) }}">Vizualizare</a>
                        <a class="btn btn-primary" href="{{route('sponsors.edit',$sponsor->id) }}">Modificare</a>
                        {{ Form::open(['method' => 'DELETE','route' =>
                        ['sponsors.destroy', $sponsor->id],'style'=>'display:inline']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btndanger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Nu exista sponsori!</td>
                </tr>
            @endif
        </table>
    </div>
 </div>
@endsection