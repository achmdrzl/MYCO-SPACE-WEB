<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Notification extends Model
{
    use HasFactory;

    protected $table = 'mc_notifications';

    protected $primaryKey = 'notification_id';

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
        'b_status'
    ];
}
