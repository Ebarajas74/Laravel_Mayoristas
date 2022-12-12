<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;

    protected $fillable = [
        'User_id',
        'contactname',
        'address',
        'postalcode',
        'neighborhood',
        'city',
        'state',
        'email',
        'phone',
        'status', 
    ];
}
