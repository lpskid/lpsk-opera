<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'determination_date',
        'determination_location',
        'invitation_date',
        'content',
        'status',
    ];
}
