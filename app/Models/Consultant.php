<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'reimbursement', 'availability', 'client_id', 'employment_id', 'skill_id', 'image'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function employment(){
        return $this->belongsTo(Employment::class);
    }

    public function skill(){
        return $this->belongsTo(Skill::class);
    }
}
