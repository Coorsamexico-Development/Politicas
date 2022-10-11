<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_politica extends Model
{
    //use HasFactory;
    protected $table = 'status_politicas';
    protected $fillable = ['id',
    'name',
    'status',
];
}
