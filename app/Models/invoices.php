<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class invoices extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'product',
        'section',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'discount',
        'value_tax',
        'rate_tax',
        'total',
        'status',
        'value_status',
        'note',
        'user',
        'Payment_Date',
        // 'payed_value',

        // 'Payment_Date',

    ];
    public function sections()
    {
        return $this->belongsTo(sections::class,'section_id');
    }
    public function invoice_details()
    {
        return $this->hasMany(invoices_details::class, 'Invoice_Id');
    }

}
