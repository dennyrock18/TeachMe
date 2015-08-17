<?php namespace TeachMe\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;
use TeachMe\Repositories\TicketRepository;

class TicketsController extends Controller {


    /**
     * @var TicketRepository
     */
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

	public function latest()
    {
        $tickets = $this->ticketRepository->paginateLatest();

        return view('tickests.list',compact('tickets'));
    }

    public function popular()
    {
        return view('tickests.list');
    }

    public function open()
    {
        $tickets = $this->ticketRepository->paginateOpen();

        return view('tickests.list',compact('tickets'));
    }

    public function closed()
    {
        $tickets = $this->ticketRepository->paginateClosed();

        return view('tickests.list',compact('tickets'));
    }

    public function details($id)
    {
        //Este metodo findOrFail a diferencia del Find es que retorna en caso de no
        //Encontarce ninguno en la BD un error 404
        //$ticket = Ticket::findOrFail($id);

        $ticket = $this->ticketRepository->findOrFail($id);

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
