@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
    <div class="panel-heading">
        Agenda
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="pull-right">
                <a href="/agendas/create" class="btn btn-default">Adaugare eveniment nou</a>
            </div>
        </div>
        <table class="table table-bordered table-stripped">
            <tr>
                <th width="20">No</th>
                <th>Titlu</th>
                <th>Descriere</th>
                <th>Data</th>
                <th>Locatie</th>
                <th>Tip</th>
                <th>Pret</th>
                <th>Disponibilitate</th>
                <th>Speaker</th>
                <th>Sponsor</th>
                <th>Partener</th>
            </tr>
            @if (count($agendas) > 0)
                @foreach($agendas as $key => $agenda)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{ $agenda->titlu }}</td>
                    <td>{{ $agenda->descriere }}</td>
                    <td>{{ $agenda->data }}</td>
                    <td>{{ $agenda->locatie }}</td>
                    <td>{{ $agenda->tip }}</td>
                    <td>{{ $agenda->pret }}</td>
                    <td>{{ $agenda->disponibilitate }}</td>
                    <td>{{ $agenda->speaker }}</td>
                    <td>{{ $agenda->sponsor }}</td>
                    <td>{{ $agenda->partener }}</td>
                    <td>
                    <a class="btn btn-success" href="{{route('agendas.show',$agenda->id) }}">Vizualizare</a>
                        <a class="btn btn-primary" href="{{ route('agendas.edit',$agenda->id) }}">Modificare</a>
                        {{ Form::open(['method' => 'DELETE','route' =>
                        ['agendas.destroy', $agenda->id],'style'=>'display:inline']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btndanger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Nu exista evenimente!</td>
                </tr>
            @endif
        </table>
    </div>
 </div>
@endsection