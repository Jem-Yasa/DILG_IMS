<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'ics_rrsp_no',
        'accountable_type',
        'article',
        'description',
        'reason',
    ];
    protected $dates = ['date'];
}
