<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulationAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "path",
    ];

    public function regulation()
    {
        return $this->belongsTo(Regulation::class);
    }
}
