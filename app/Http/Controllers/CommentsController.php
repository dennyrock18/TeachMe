<?php namespace TeachMe\Http\Controllers;

use TeachMe\Entities\Ticket;
use TeachMe\Entities\TiketsComments;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentsController extends Controller {

    public function submit($id, Request $request)
    {
        //dd($ticket->id());

        $this->validate($request, [
          'comment' => 'required|max:250',
            'link'  => 'url'
        ]);

        $comment = new TiketsComments($request->all());
        $comment->user_id = auth()->user()->id;

        $ticket = Ticket::find($id);
        $ticket->comments()->save($comment);

        //Mensaje de confirmacion
        session()->flash('sucess','Tu comentario fue guardado exitosamente');

        return redirect()->back();
    }

}
