<?php

namespace TeachMe\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = ['title', 'status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(TiketsComments::class);
    }

    //Relacion Tiene y pertenece a muuchos

    public function voters()
    {
        return $this->belongsToMany(User::class,'ticket_votes')->withTimestamps();
    }

    public function getOpenAttribute()
    {

        return $this->status == 'open';
    }
}
