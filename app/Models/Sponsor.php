<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public $fillable = ['id','nume'];

public function events()
{
    return $this->belongsToMany(Event::class);
}


}
