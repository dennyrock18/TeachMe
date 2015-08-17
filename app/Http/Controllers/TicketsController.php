<?php namespace TeachMe\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TicketsController extends Controller {

    protected function selectTicketsList()
    {
        return Ticket::selectRaw(
            'tickets.*, '
            . '( SELECT COUNT(*) FROM tikets_comments WHERE tikets_comments.ticket_id = tickets.id ) as num_comments,'
            . '( SELECT COUNT(*) FROM ticket_votes WHERE ticket_votes.ticket_id = tickets.id ) as num_votes'
        )->with('user');
    }

	public function latest()
    {
        $tickets = $this->selectTicketsList()
            ->orderBy('created_at','DESC')
            ->with('user')
            ->paginate(10);

        return view('tickests.list',compact('tickets'));
    }

    public function popular()
    {
        return view('tickests.list');
    }

    public function open()
    {
        $tickets = $this->selectTicketsList()
            ->where('status','open')
            ->orderBy('created_at','DESC')
            ->paginate(10);

        return view('tickests.list',compact('tickets'));
    }

    public function closed()
    {
        $tickets = $this->selectTicketsList()
            ->where('status','closed')
            ->orderBy('created_at','DESC')
            ->paginate(10);

        return view('tickests.list',compact('tickets'));
    }

    public function details($id)
    {
        //Este metodo findOrFail a diferencia del Find es que retorna en caso de no
        //Encontarce ninguno en la BD un error 404
        $ticket = Ticket::findOrFail($id);

        //dd($tickets);

        return view('tickests.details', compact('ticket'));
    }

    public function create()
    {
        return view('tickests.create');
    }

    public function store(Request $request, Guard $auth)
    {
        $this->validate($request, [
            'title' => 'required|max:120'
        ]);

        $tickets = $auth->user()->tickets()->create([
            'title'  => $request->get('title'),
            'status' => 'open'
        ]);

        return redirect()->route('tickets.details', $tickets->id);

        //return Redirect::route('tickets.details', $tickets->id);
    }

}
