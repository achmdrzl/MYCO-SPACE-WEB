<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Booking extends Model
{
    use HasFactory;

    protected $table = 'mc_bookings';

    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'v_code',
        'v_city',
        'v_occupation',
        'v_preference',
        'v_location',
        'v_spaces',
        'v_people',
        'dt_start',
        'dt_tour',
        'v_name',
        'v_companyname',
        'v_email',
        'v_phone',
        'v_notesleadbooking',
        'b_leadstatus',
        'v_notesleadstatus',
        'b_membershipstatus',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'deleted_at',
        'b_status',
    ];

    public function location()
    {
        return $this->belongsTo(Mc_Location::class, 'v_location', 'v_code');
    }

    public function space()
    {
        return $this->belongsTo(Mc_Spaces::class, 'v_spaces', 'v_code');
    }
}
