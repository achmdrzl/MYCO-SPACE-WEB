<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Company extends Model
{
    use HasFactory;

    protected $table = 'mc_company';

    protected $primaryKey = 'company_id';

    protected $fillable = [
        'v_code',
        'v_name',
        'v_email',
        'v_phone',
        'v_address',
        'v_city',
        'v_zipcode',
        'v_picture',
        'v_notes',
        'v_npwp',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'deleted_at',
        'b_status',
    ];


    public function members()
    {
        return $this->hasMany(Mc_Member::class, 'fk_company', 'company_id')
        ->select(['member_id', 'v_name', 'v_location'])
        ->where('b_picstatus', 1)
        ->where('b_status', 1);
    }
}
