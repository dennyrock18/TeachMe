<?php namespace TeachMe\Http\Controllers;

use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TicketsController extends Controller {

	public function latest()
    {
        $tickets = Ticket::orderBy('created_at','DESC')->paginate(8);

        //dd($tickets);

        return view('tickests.list',compact('tickets'));
    }

    public function popular()
    {
        return view('tickests.list');
    }

    public function open()
    {
        return view('tickests.list');
    }

    public function closed()
    {
        return view('tickests.list');
    }

    public function details($id)
    {
        //Este metodo findOrFail a diferencia del Find es que retorna en caso de no
        //Encontarce ninguno en la BD un error 404
        $ticket = Ticket::findOrFail($id);

        //dd($tickets);

        return view('tickests.details', compact('ticket'));
    }

}
