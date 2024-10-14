<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'regulation_id',
        'name',
        'email',
        'phone',
        'status',
        'age',
        'gender',
        'content',
    ];

    public function regulation()
    {
        return $this->belongsTo(Regulation::class);
    }
}
