<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties'; // Ensure this matches your database table name

    protected $fillable = [
        'property_type',
        'entry_name',
        'date_acquired',
        'ics_rrsp_no',
        'reference',
        'semi_expendable_name',
        'semi_expendable_no',
        'item_description',
        'estimated_useful_life',
        'status',
        'quantity',
        'office_officer',
        'amount',
        'remarks',
    ];
}
