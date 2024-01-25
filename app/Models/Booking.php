<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'mc_booking';

    protected $primaryKey = 'i_code';

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
        'dt_created',
        'dt_updated',
        'dt_deleted',
        'b_status',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The names of the columns that represent dates.
     *
     * @var array
     */
    protected $dates = [
        'dt_created', // instead of created_at
        'dt_updated', // instead of updated_at
        'dt_deleted', // instead of deleted_at
    ];
}
