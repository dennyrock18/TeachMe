<?php namespace TeachMe\Http\Controllers;

use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;

class VotesController extends Controller {



	public function submit($id)
	{
		$ticket = Ticket::find($id);

		dd('Votar por el ticket con el id: '. $id .' de nombre:'. $ticket->title);
	}


	public function destroy($id)
	{
		$ticket = Ticket::find($id);

		dd('Eliminar el Votp de ticket con el id: '. $id .' de nombre:'. $ticket->title);
	}

}
