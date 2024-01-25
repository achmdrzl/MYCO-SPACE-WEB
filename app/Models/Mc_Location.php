<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Location extends Model
{
    use HasFactory;

    protected $table = 'mc_locations';

    protected $primaryKey = 'location_id';

    protected $fillable = [
        'v_code',
        'v_city',
        'v_name',
        'v_notes',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'b_status'
    ];

    public function bookings()
    {
        return $this->hasMany(Mc_Booking::class, 'v_location', 'v_code');
    }
}
