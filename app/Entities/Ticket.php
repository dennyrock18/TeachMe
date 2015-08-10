<?php

namespace TeachMe\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /*
     * The database table used by the model.
     *
     * @var string
     */
    //protected $table = 'tickets';

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
   //protected $fillable = ['title', 'status'];

    public function getOpenAttribute()
    {

        return $this->status == 'open';
    }
}
