<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Member extends Model
{
    use HasFactory;

    protected $table = 'mc_members';

    protected $primaryKey = 'member_id';

    protected $fillable = [
        'v_code',
        'fk_booking',
        'fk_company',
        'v_name',
        'v_email',
        'v_email2',
        'v_phone',
        'v_location',
        'v_spaces',
        'i_people',
        'v_idnumber',
        'v_address',
        'v_city',
        'v_zipcode',
        'dt_birthdate',
        'b_gender',
        'v_picture',
        'v_accesscard',
        'b_picstatus',
        'b_frequent',
        'b_membershipstatus',
        'dt_start',
        'dt_end',
        't_start',
        't_end',
        'v_room',
        'b_agreement',
        'b_houserules',
        'v_notes',
        'dt_lastpaid',
        'b_paidstatus',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'deleted_at',
        'b_status',
    ];
}
