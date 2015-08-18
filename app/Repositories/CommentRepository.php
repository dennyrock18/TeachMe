<?php
/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 17/08/2015
 * Time: 16:15
 */

namespace TeachMe\Repositories;


use TeachMe\Entities\User;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TiketsComments;

class CommentRepository extends BaseRepository
{

    /**
     * @return \TeachMe\Entities\Entity
     */
    public function getModel()
    {
        return new TiketsComments();
    }

    public function create(User $user,Ticket $ticket, $comment, $link='')
    {
        $comment = new TiketsComments(compact('comment', 'link'));
        $comment->user_id = $user->id;
        $ticket->comments()->save($comment);
    }


}