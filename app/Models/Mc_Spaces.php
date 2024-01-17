<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Spaces extends Model
{
    use HasFactory;

    protected $table = 'mc_spaces';

    protected $primaryKey = 'space_id';

    protected $fillable = [
        'v_code',
        'v_category',
        'v_name',
        'v_notes',
        'b_hasquota',
        'b_template',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'deleted_at',
        'b_status'
    ];

    public function member()
    {
        return $this->hasOne(Mc_Company::class, 'v_location');
    }

    public function bookings()
    {
        return $this->hasMany(Mc_Booking::class, 'v_spaces', 'v_code');
    }
}
