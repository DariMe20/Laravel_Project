@extends('layoutcos')
@section('title', 'Tickets')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista biletelor
            <div class="pull-right">
                <a href="/tickets/create" class="btn btn-default">Adaugare bilet nou</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Tip</th>
                    <th>Pret</th>
                    <th>Disponibilitate</th>
                    <th>Actiuni</th>
                </tr>
                @if (count($tickets) > 0)
                    @foreach ($tickets as $key => $ticket)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $ticket->tip }}</td>
                            <td>{{ $ticket->pret }}</td>
                            <td>{{ $ticket->disponibilitate }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('tickets.show', $ticket->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('tickets.edit', $ticket->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['tickets.destroy', $ticket->id], 'style' => 'display:inline']) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Nu exista bilete!</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

    <div class="container tickets">
        <div class="row">
            @if (count($tickets) > 0)
               @foreach ($tickets as $key => $ticket)
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="caption">
                <h3>{{ $ticket->tip }}</h3>
                <p>{{ Str::limit(strtolower($ticket->disponibilitate)) }}</p>
                <p><strong>Pret: </strong> {{ $ticket->pret }}$</p>
                <p class="btn-holder">
                    @if ($ticket->disponibilitate > 0)
                        <a href="{{ url('add-to-cart/'.$ticket->id) }}" class="btn btn-warning btn-block text-center" role="button">Pune in cos</a>
                    @else
                        <button class="btn btn-danger btn-block text-center" disabled>Sold Out</button>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endforeach
            @else
                <div class="col-xs-12">
                    <p>Nu există bilete disponibile!</p>
                </div>
            @endif
        </div>
    </div>
@endsection
