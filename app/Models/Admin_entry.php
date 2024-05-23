<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_entry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'role',
        'action',

    ];
}
