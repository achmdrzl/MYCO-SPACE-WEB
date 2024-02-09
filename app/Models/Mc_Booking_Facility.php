<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Booking_Facility extends Model
{
    use HasFactory;

    protected $table = 'mc_booking_facility';

    protected $primaryKey = 'bookingfacility_id';

    protected $fillable = [
        'fk_company',
        'fk_spaces',
        'v_location',
        'dt_start',
        'dt_end',
        'i_pcs',
        'v_notes',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'b_status',
    ];
}
