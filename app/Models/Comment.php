<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chirp;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'chirp_id',
    ];

    public function chirp()
    {
        return $this->belongsTo(Chirp::class);
    }
}
