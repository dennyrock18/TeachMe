@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="title-show">{{ $ticket -> title }}</h2>
                @include('partials.error')
                @if(Session::has('sucess'))
                    <div class="alert alert-success">
                        {{ Session::get('sucess')}}
                    </div>
                @endif
                @include('tickests.partials.status', compact('ticket'))


                <p class="date-t">
                    <span class="glyphicon glyphicon-time"></span>{{ $ticket->created_at->format('d/m/y h:ia') }}
                    - {{ $ticket->user->name }}</p>
                <h4 class="label label-info news">{{ count ($ticket->voters) }} </h4>

                <p class="vote-users">

                    @foreach($ticket->voters as $user)
                        <span class="label label-info">{{ $user->name }}</span>
                    @endforeach
                </p>

                @if( auth()->guest())
                    Para botar por este Tickets, debe estar <a href="{{ url('/auth/login') }}">Logeado</a>
                @else
                    @if(! auth()->user()->hasVoted($ticket))
                        {!! Form::open(['route' => ['vote.submit', $ticket->id], 'method' => 'POST']) !!}
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-thumbs-up"></span> Votar
                        </button>
                        {!! Form::close()!!}
                    @else
                        {!! Form::open(['route' => ['vote.destroy', $ticket->id], 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-thumbs-down"></span> Quitar Voto
                        </button>
                        {!! Form::close()!!}
                    @endif
                @endif


                <h3>Nuevo Comentario</h3>


                {!! Form::open(['route' => ['comments.submit', $ticket->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('comment', 'Comentario:') !!}
                    {!! Form::textarea('comment',null,['rows'=> 4,'class'=> 'form-control','placeholder' => 'Escribe su comentario'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('link', 'Enlace:') !!}
                    {!! Form::text('link',null,['class'=> 'form-control', 'placeholder' => 'Si decea, introduce un enlace']) !!}
                </div>
                <button type="submit" class="btn btn-primary">Enviar comentario</button>
                {!! Form::close() !!}

                <h3>Comentarios ({{ count($ticket->comments) }})</h3>

                @foreach($ticket->comments as $comment)
                    <div class="well well-sm">
                        <p><strong>{{$comment -> user -> name }}</strong></p>

                        <p>{{$comment -> comment }} </p>

                        <p><a href="{{$comment -> link }}" rel="nofollow" target="_blank"> {{$comment -> link }} </a>
                        </p>

                        <p class="date-t"><span
                                    class="glyphicon glyphicon-time"></span> {{ $comment->created_at->format('d/m/Y h:ia' ) }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
