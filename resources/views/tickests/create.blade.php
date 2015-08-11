
@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                 <h2>Nueva Solicitud</h2>
                @include('partials.error')
                {!! Form::open(['route' => 'tickets.store', 'method' => 'POST']) !!}
                @include('tickests.partials.fields')
                <button type="submit" class="btn btn-default">Crear solicitud</button>
                {!! Form::close() !!}
            </div>
    </div>

@endsection