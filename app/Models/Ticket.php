<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function operators(){
        return $this->hasMany(Operator::class);
    }

    public function categories(){
        return $this->hasMany(Category::class);
    }

    protected $fillable = [
        'title',
        'description',
        'status'
    ];
}
