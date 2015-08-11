<?php namespace TeachMe\Http\Controllers;

use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentsController extends Controller {

    public function submit($id)
    {
        dd('estoy aqui');

        $ticket = Ticket::find($id);

        dd('Comentario para el ticket con el id: '. $id .' de nombre:'. $ticket->title);
    }

}
