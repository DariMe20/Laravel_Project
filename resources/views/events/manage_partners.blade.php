@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Gestionează Partneri pentru Eveniment: {{ $event->titlu }}</div>
    <div class="panel-body">
        <h4>Partneri Asociați</h4>
        @foreach($event->partners as $partner)
            <form method="POST" action="{{ route('events.removePartner', ['event' => $event->id, 'partner' => $partner->id]) }}">
                @csrf
                @method('DELETE')
                <div>{{ $partner->nume }}</div>
                <button type="submit" class="btn btn-danger">Șterge</button>
<a href="{{ route('partners.edit', $partner->id) }}"  class="btn btn-info">Editează</a>
            </form>
        @endforeach

        <h4>Adaugă un Partner</h4>
        <form method="POST" action="{{ route('events.addPartner', $event->id) }}">
            @csrf
            <select name="partner_id">
                @foreach($allPartners as $partner)
                    <option value="{{ $partner->id }}">{{ $partner->nume }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success">Adaugă</button>
        </form>
    </div>
</div>
@endsection
