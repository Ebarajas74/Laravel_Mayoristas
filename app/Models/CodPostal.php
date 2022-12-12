<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodPostal extends Model
{
    use HasFactory;

    protected $table = "codpostales";

    public function codigos()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
