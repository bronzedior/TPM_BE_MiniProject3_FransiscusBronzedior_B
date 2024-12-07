<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $fillable = [
        'industry', 'expertise'
    ];

    public function consultant(){
        return $this->hasMany(Consultant::class);
    }
}
