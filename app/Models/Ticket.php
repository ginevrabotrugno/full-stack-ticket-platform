<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function operator(){
        return $this->belongsTo(Operator::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'title',
        'operator_id',
        'category_id',
        'description',
        'status'
    ];
}
