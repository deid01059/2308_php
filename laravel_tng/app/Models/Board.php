<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory,SoftDeletes;



    protected $fillable = [
        'b_title',
        'b_content',
        'b_hits'
    ];
}
