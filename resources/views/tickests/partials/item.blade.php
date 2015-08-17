<div data-id="25" class="well well-sm request">
    {{ $ticket->title }}
    <h4 class="list-title">
        @include('tickests.partials.status', compact('ticket'))

    </h4>

    <p>
        {{--  <a href="#" class="btn btn-primary btn-vote" title="Votar por este tutorial">
            <span class="glyphicon glyphicon-thumbs-up"></span> Votar
        </a>

        <a href="#" class="btn btn-hight btn-unvote hide">
            <span class="glyphicon glyphicon-thumbs-down"></span> No votar
        </a>--}}


        <a href="{{ route('tickets.details', $ticket) }}">
            <span class="votes-count">{{ $ticket->num_votes }} votos</span>
            {{--De esta manera en la que traigo todos los comenrarios es igual que la de todos los votes pero es otra forma--}}
            - <span class="comments-count">{{ $ticket->num_comments }} comentarios</span>.
        </a>


    <p class="date-t"><span class="glyphicon glyphicon-time"></span>{{ $ticket->created_at->format('d/m/y h:ia') }} Autor: {{ $ticket->user->name }}</p>
    </p>
</div>
