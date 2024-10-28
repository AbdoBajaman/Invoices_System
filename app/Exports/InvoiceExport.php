<?php

namespace App\Exports;

use App\Models\invoices;
use App\Models\invoices_details;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoiceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Return the invoices data with related sections and invoice_details
        $invoices = invoices::select('invoice_number', 'section_id', 'product','invoice_date','due_date', 'amount_collection','Amount_Commission', 'discount', 'status', 'payment_date','rate_tax','value_tax','total')->get();
        // dd($firstInvoiceDetail);

        return $invoices->map(function ($invoice ) {
            // dd($invoice->due_date); // Check what this outputs


// dd($invoice);

            return [
                'invoice_number' => $invoice->invoice_number,
                'section' => $invoice->sections->section_name ?? 'N/A',
                'product' => $invoice->product,
                'amount_collection' => $invoice->amount_collection,
                // 'payed_value' => $firstInvoiceDetail ?? 'N/A',
                'discount' => $invoice->discount,


                'Amount_Commission'=> $invoice->Amount_Commission ? $invoice->Amount_Commission : 0,
                'rate_tax'=> $invoice->rate_tax ? $invoice->rate_tax : 0,


                'value_tax'=> $invoice->value_tax ? $invoice->value_tax : 0,



                'total'=> $invoice->total ? $invoice->total :'0',
                'status' => $invoice->status,
                'invoice_date' => $invoice->invoice_date ? $invoice->invoice_date : 'N/A',

                'payment_date' => $invoice->payment_date ?? ' لم يتم',
                'due_date' => $invoice->due_date ? $invoice->due_date : 'N/A',

            ];
        });
    }


    /**
     * Define the headings for the Excel columns
     * @return array
     */
    public function headings(): array
    {
        return [

            'رقم الفاتوره',
            'القسم',
            'المنتج',
            'مبلغ التحصيل',
            //  'المبلغ المدفوع',
            'الخصم',
            'مبلغ العموله',
            'نسبة الضريبة',
            'قيمة الضريبة',
            'اجمالي العموله شامل الضريبه',

            'الحاله',
            'تاريخ الفاتوره',
            'تاريخ الدفع',
            'تاريخ الاستحقاق',

        ];
    }
}
