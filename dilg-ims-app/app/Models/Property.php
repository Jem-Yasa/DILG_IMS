<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties'; // Ensure this matches your database table name

    protected $fillable = [
        'office',
        'ics_rrsp_no',
        'accountable_type', // Corrected field name
        'article', // Corrected field name
        'description',
        'unit_measure',
        'unit_value',
        'quantity',
        'total_cost',
        'inventory_item_no',
        'date_acquired',
        'estimated_useful_life',
        'accountable_officer',
        'status',
        'remarks',
    ];
}
