<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysCodeSetting extends Model
{
    use HasFactory;

    protected $table = 'sys_code_settings';

    protected $primaryKey = 'code_id';

    protected $fillable = [
        'v_table',
        'v_code',
        'i_digit',
        'v_separator',
        'v_dateformat',
        'i_count'
    ];
}
