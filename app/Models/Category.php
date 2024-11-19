<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    protected $fillable = [
        'name',
        'description'
    ];
}
