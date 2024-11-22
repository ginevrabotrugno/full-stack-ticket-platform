<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    public function tickets(){
        return $this->hasmany(Ticket::class);
    }

    protected $fillable = [
        'name',
        'is_available'
    ];
}
