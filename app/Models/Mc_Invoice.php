<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mc_Invoice extends Model
{
    use HasFactory;

    protected $table = 'mc_invoices';

    protected $primaryKey = 'invoice_id';

    protected $fillable = [
        'v_code',
        'fk_invoiceutama',
        'fk_booking',
        'fk_memberpic',
        'v_location',
        'v_title',
        'v_name',
        'v_email',
        'v_email2',
        'v_email3',
        'v_email4',
        'v_email5',
        'v_phone',
        'v_address',
        'i_subtotal',
        'i_discount',
        'i_tax',
        'i_total',
        'i_dp',
        'dt_due',
        'v_token',
        'i_print',
        'i_send',
        'dt_send',
        'b_ispaid',
        'dt_paid',
        'v_paymenttype',
        'v_proof',
        'dt_uploadproof',
        'b_confirmed',
        'dt_confirmed',
        'b_renewal',
        'b_hasdeposit',
        'b_deposit',
        'b_overtime',
        'v_notes',
        'v_createdby',
        'v_updatedby',
        'v_deletedby',
        'b_status',
    ];

    public function booking()
    {
        return $this->belongsTo(Mc_Booking::class, 'fk_booking', 'booking_id');
    }

    public function details()
    {
        return $this->hasMany(Mc_InvoiceDetail::class, 'fk_invoice', 'invoice_id');
    }
}
