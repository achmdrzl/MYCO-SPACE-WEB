<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Pricing extends Model
{
    use HasFactory;

    protected $table = 'mc_pricings';

    protected $primaryKey = 'pricing_id';

    protected $fillable = [
        'v_location',
        'v_spaces',
        'i_amount',
        'v_unit',
        'v_notes',
        'b_showcompro',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'b_status'
    ];
}
