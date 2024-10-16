<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'jdih_link',
        'title',
        'information',
        'date',
        'content',
        'status',
    ];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function attachments()
    {
        return $this->hasMany(RegulationAttachment::class);
    }
}
