<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices_attachments extends Model
{
    use HasFactory;
    protected $fillable = [
        "File_Name",
        "Invoice_Id",
        "invoice_number",
        'created_by',

    ];
}