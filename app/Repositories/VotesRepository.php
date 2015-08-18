<?php
/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 17/08/2015
 * Time: 16:15
 */

namespace TeachMe\Repositories;

use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketVote;
use TeachMe\Entities\User;

class VotesRepository extends BaseRepository
{

    /**
     * @return \TeachMe\Entities\Entity
     */
    public function getModel()
    {
        return new TicketVote();
    }

    /**
     * @param User $user
     * @param Ticket $ticket
     * @return bool
     */
    public function vote($user, $ticket)
    {
        if ($user->hasVoted($ticket)) return false;

        $user->voters()->attach($ticket);
        return true;
    }

    public function unvote(User $user, Ticket $ticket)
    {
        $user->voters()->detach($ticket);

    }



}