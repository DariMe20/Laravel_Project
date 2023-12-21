<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\EventController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;

class Event extends Model
{
    use HasFactory;
    public $fillable = ['id','titlu', 'descriere', 'data', 'locatie'];

    public function tickets()
{
    return $this->hasMany(Ticket::class);
}
public function speakers()
{
    return $this->belongsToMany(Speaker::class, 'event_speaker');
}


public function sponsors()
{
    return $this->belongsToMany(Sponsor::class);
}

public function partners()
{
    return $this->belongsToMany(Partner::class);
}
}
