@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
    <div class="panel-heading">
        Lista parteneri
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="pull-right">
                <a href="/partners/create" class="btn btn-default">Adaugare partener nou</a>
            </div>
        </div>
        <table class="table table-bordered table-stripped">
            <tr>
                <th width="20">No</th>
                <th>Nume</th>
            </tr>
            @if (count($partners) > 0)
                @foreach($partners as $key => $partner)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$partner->nume}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('partners.show',$partner->id) }}">Vizualizare</a>
                        <a class="btn btn-primary" href="{{ route('partners.edit',$partner->id) }}">Modificare</a>
                        {{ Form::open(['method' => 'DELETE','route' =>
                        ['partners.destroy', $partner->id],'style'=>'display:inline']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btndanger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Nu exista parteneri!</td>
                </tr>
            @endif
        </table>
    </div>
 </div>
@endsection