<?php

namespace App\Http\Controllers;

use App\Models\invoices_details;
use Illuminate\Http\Request;
use App\Models\invoices;
use App\Models\invoices_attachments;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\DB;

// use App\Models\invoices_details;
class InvoicesDetailsController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('permission:عرض تفاصيل الفاتورة', only: ['show']),

        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        // dd('details');

        $invoices = invoices::find($id);
        $details_count = invoices_details::where('Invoice_Id', $id)->count();
        $invoice_details = invoices_details::where('Invoice_Id', $id)->get();

        $attachment_count = invoices_attachments::where('Invoice_Id', $id)->count();
        // $invoice_details= invoices_details::latest()->where('invoice_number', $invoices->invoice_number)->first();

        $latest_invoice_details = invoices_details::latest()->where('invoice_number', $invoices->invoice_number)->first(['payed_value', 'invoice_number']);
        // dd($latest_invoice_details);
        // dd(''.$invoice_details->());
        // $notification = DB::table('notifications')->where('data->invoice_id', $id)->first();
        DB::table('notifications')->where('data->invoice_id', $id)->update(['read_at' => now()]);

        $invoice_attachments = invoices_attachments::where('Invoice_Id', $id)->get();
        if ($attachment_count == 0) {
            return view('Invoices.invoice_details', compact('invoices', 'invoice_details', 'details_count', 'attachment_count', 'latest_invoice_details'));
        } else {
            // dd('1');
            // dd('    1');
            return view('Invoices.invoice_details', compact('invoices', 'invoice_details', 'invoice_attachments', 'details_count', 'attachment_count', 'latest_invoice_details'));
        }
        // if($attachment_count ==0)
        // {
        //     return view('Invoices.invoice_details', compact('invoices', 'invoice_details', 'invoice_attachments', 'details_count','attachment_count'));

        // }
        // dd('not found');
        // dd($invoice_attachments);
        // dd($invoice_details);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoices_details $invoices_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
