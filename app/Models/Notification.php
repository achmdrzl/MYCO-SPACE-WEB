<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'mc_notification';

    protected $primaryKey = 'i_code';

    protected $timestamps = false;

    protected $fillable = [
        'fk_booking',
        'fk_memberpic',
        'v_subject',
        'v_location',
        'v_spaces',
        'v_description',
        'b_isread',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'dt_created',
        'dt_updated',
        'dt_deleted',
        'b_status'
    ];
}
