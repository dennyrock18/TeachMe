<?php namespace TeachMe\Http\Controllers;

use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TeachMe\Repositories\TicketRepository;
use TeachMe\Repositories\VotesRepository;

class VotesController extends Controller {
	/**
	 * @var TicketRepository
	 */
	private $ticketRepository;
	/**
	 * @var VotesRepository
	 */
	private $votesRepository;

	/**
	 * @param TicketRepository $ticketRepository
	 * @param VotesRepository $votesRepository
     */
	public function __construct(TicketRepository $ticketRepository, VotesRepository $votesRepository)
	{
		$this->ticketRepository = $ticketRepository;
		$this->votesRepository = $votesRepository;
	}

	public function submit($id)
	{
		$ticket = $this->ticketRepository->findOrFail($id);
		$this->votesRepository->vote(auth()->user(), $ticket);

		return redirect()->back();
	}

	public function destroy($id)
	{
		$ticket = $this->ticketRepository->findOrFail($id);
		$this->votesRepository->unvote(auth()->user(), $ticket);

		return redirect()->back();
	}
}