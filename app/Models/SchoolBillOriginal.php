<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolBillOriginal extends Model
{
    use HasFactory;
    public $table = 'school_bill_originals';
    protected $fillable = [
        "school_id", "bill_type", "location", "mobile", "email_id", "gst_number", "total_fees_amount", "received_amount",
        "due_amount", "cgst", "sgst", "total", "receipt_date", "payment_mode", "transaction_id", "bank_name",
        "cheque_number", "gst_number_school"
    ];
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function bill_session()
    {
        return $this->belongsTo(BillSession::class, 'bill_session_id', 'id');
    }
}
