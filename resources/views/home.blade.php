@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div> <a href="{{URL::to('events') }}"> Afisare toate evenimentele</a> </div>
                    <div> <a href="{{URL::to('tickets') }}"> Afisare toate biletele</a> </div>
                    <div> <a href="{{URL::to('speakers') }}"> Afisare toti artistii</a> </div>
                    <div> <a href="{{URL::to('sponsors') }}"> Afisare toti sponsorii</a> </div>
                    <div> <a href="{{URL::to('partners') }}"> Afisare toti partenerii</a> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
