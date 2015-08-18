<?php namespace TeachMe\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TiketsComments;
use TeachMe\Http\Requests;
use TeachMe\Repositories\CommentRepository;
use TeachMe\Repositories\TicketRepository;

class CommentsController extends Controller
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;
    /**
     * @var TicketRepository
     */
    private $ticketRepository;


    /**
     * @param CommentRepository $commentRepository
     * @param TicketRepository $ticketRepository
     */
    public function __construct(CommentRepository $commentRepository, TicketRepository $ticketRepository)
    {

        $this->commentRepository = $commentRepository;
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * @param $id
     * @param Request $request
     * @param Guard $auth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit($id, Request $request)
    {
        //dd(auth()->user());

        $this->validate($request, [
            'comment' => 'required|max:250',
            'link' => 'url'
        ]);

        $ticket = $this->ticketRepository->findOrFail($id);

        $this->commentRepository->create(auth()->user(), $ticket, $request->get('comment'), $request->get('link'));


        //Mensaje de confirmacion
        session()->flash('sucess', 'Tu comentario fue guardado exitosamente');

        return redirect()->back();
    }

}
