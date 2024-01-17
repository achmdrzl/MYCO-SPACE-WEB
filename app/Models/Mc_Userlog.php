<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Userlog extends Model
{
    use HasFactory;

    protected $table = 'mc_userlogs';

    protected $primaryKey = 'userlog_id';

    protected $fillable = [
        'fk_user',
        'v_activity',
        'v_description',
        'v_createdby'
    ];
}
