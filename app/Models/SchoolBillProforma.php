<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolBillProforma extends Model
{
    use HasFactory;
    public $table = 'school_bill_proformas';
    protected $fillable = [
        "school_id", "school_gst_number", "bill_type", "location", "mobile", "email_id", "gst_number", "total_fees_amount", "received_amount",
        "due_amount", "cgst", "sgst", "total", "receipt_date", "payment_mode", "transaction_id", "bank_name",
        "cheque_number"
    ]; 
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}
