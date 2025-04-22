<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties'; 

    protected $fillable = [
        'office',
        'ics_rrsp_no',
        'accountable_type', 
        'value',
        'article', 
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
