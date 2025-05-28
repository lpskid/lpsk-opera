<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicParticipation extends Model
{
    use HasFactory;

    protected $fillable = [
        'regulation_id',
        'name',
        'email',
        'company',
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