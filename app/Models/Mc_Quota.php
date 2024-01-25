<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Quota extends Model
{
    use HasFactory;

    protected $table = 'mc_quotas';

    protected $primaryKey = 'quota_id';

    protected $fillable = [
        'fk_company',
        'fk_spaces',
        'i_quota',
        'v_notes',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'b_status',
    ];
}
