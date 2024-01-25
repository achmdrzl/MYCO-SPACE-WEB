<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_InvoiceDetail extends Model
{
    use HasFactory;

    protected $table = 'mc_invoice_details';

    protected $primaryKey = 'invoicedetail_id';

    protected $fillable = [
        'fk_invoice',
        'v_spaces',
        'i_qty',
        'i_unit',
        'v_unit',
        'v_periode',
        'i_amount',
        'i_discount',
        'i_subtotal',
        'v_notes',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'b_status'
    ];

    public function invoice()
    {
        return $this->belongsTo(Mc_Invoice::class, 'fk_invoice', 'invoice_id');
    }
}
