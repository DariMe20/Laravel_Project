@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Gestionează Sponsori pentru Eveniment: {{ $event->titlu }}</div>
    <div class="panel-body">
        <h4>Sponsori Asociați</h4>
        @foreach($event->sponsors as $sponsor)
            <form method="POST" action="{{ route('events.removeSponsor', ['event' => $event->id, 'sponsor' => $sponsor->id]) }}">
                @csrf
                @method('DELETE')
                <div>{{ $sponsor->nume }}</div>
                <button type="submit" class="btn btn-danger">Șterge</button>
<a href="{{ route('sponsors.edit', $sponsor->id) }}"  class="btn btn-info">Editează</a>
            </form>
        @endforeach

        <h4>Adaugă un Sponsor</h4>
        <form method="POST" action="{{ route('events.addSponsor', $event->id) }}">
            @csrf
            <select name="sponsor_id">
                @foreach($allSponsors as $sponsor)
                    <option value="{{ $sponsor->id }}">{{ $sponsor->nume }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success">Adaugă</button>
        </form>
    </div>
</div>
@endsection
