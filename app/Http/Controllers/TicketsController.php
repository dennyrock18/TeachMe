<?php namespace TeachMe\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TicketsController extends Controller {

	public function latest()
    {
        $tickets = Ticket::orderBy('created_at','DESC')->paginate(8);

        return view('tickests.list',compact('tickets'));
    }

    public function popular()
    {
        return view('tickests.list');
    }

    public function open()
    {
        $tickets = Ticket::where('status','open')->paginate(8);

        return view('tickests.list',compact('tickets'));
    }

    public function closed()
    {
        $tickets = Ticket::where('status','closed')->paginate(8);

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
