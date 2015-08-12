<?php

namespace TeachMe\Entities;

use Illuminate\Database\Eloquent\Model;

class TiketsComments extends Model
{
    protected $fillable = ['comment', 'link'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
