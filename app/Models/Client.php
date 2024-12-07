<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'needs', 'duration', 'compensation'
    ];

    public function consultant(){
        return $this->hasMany(Consultant::class);
    }
}
