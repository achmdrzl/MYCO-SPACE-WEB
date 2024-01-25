<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Overtime extends Model
{
    use HasFactory;

    protected $table = 'mc_overtime';

    protected $primaryKey = 'overtime_id';

    protected $fillable = [
        'v_code',
        'fk_company',
        'fk_memberpic',
        'dt_overtime',
        'tm_start',
        'tm_end',
        'b_invoiced',
        'fk_invoice',
        'v_notes',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'b_status',
    ];
}
