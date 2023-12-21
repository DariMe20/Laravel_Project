@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Gestionează Speakeri pentru Eveniment: {{ $event->titlu }}</div>
    <div class="panel-body">
        <h4>Speakeri Asociați</h4>
        @foreach($event->speakers as $speaker)

            <form method="POST" 
action="{{ route('events.removeSpeaker', ['event' => $event->id, 'speaker' => $speaker->id]) }}">
                @csrf
                @method('DELETE')
                <div>{{ $speaker->nume }}</div>
                <button type="submit" class="btn btn-danger">Șterge</button>
    <a href="{{ route('speakers.edit', $speaker->id) }}"  class="btn btn-info">Editează</a>
            </form>
        @endforeach

        <h4>Adaugă un Speaker</h4>
        <form method="POST" action="{{ route('events.addSpeaker', $event->id) }}">
            @csrf
            <select name="speaker_id">
                @foreach($allSpeakers as $speaker)
                    <option value="{{ $speaker->id }}">{{ $speaker->nume }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success">Adaugă</button>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        </form>
    </div>
</div>
@endsection
