<?php

namespace TeachMe\Repositories;
use TeachMe\Entities\Ticket;

class TicketRepository extends BaseRepository{

    /**
     * @return \TeachMe\Entities\Entity
     */
    public function getModel()
    {
        return new Ticket();
    }

    protected function selectTicketsList()
    {
        return $this->newQuery()->selectRaw(
            'tickets.*, '
            . '( SELECT COUNT(*) FROM tikets_comments WHERE tikets_comments.ticket_id = tickets.id ) as num_comments,'
            . '( SELECT COUNT(*) FROM ticket_votes WHERE ticket_votes.ticket_id = tickets.id ) as num_votes'
        )->with('user');
    }
    public function paginateLatest()
    {
        return $this->selectTicketsList()
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }
    public function paginateOpen()
    {
        return $this->selectTicketsList()
            ->where('status', 'open')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }
    public function paginateClosed()
    {
        return $this->selectTicketsList()
            ->where('status', 'closed')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }
    public function findOrFail($id)
    {
        return Ticket::findOrFail($id);
    }

    public function openNew($user, $title)
    {
        return $user->tickets()->create([
            'title'  => $title,
            'status' => 'open'
        ]);
    }


}