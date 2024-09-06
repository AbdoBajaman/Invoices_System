<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;

class InvoiceArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $invoices=invoices::onlyTrashed()->get();
        return view("Invoices.Archive_invoices",compact("invoices"));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $invoices=invoices::withTrashed()->where('id','=',$request->invoice_id)->restore();
        session()->flash('restore_invoice');
        return redirect()->route("invoices.index");



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $invoice_id=$request->invoice_id;
        if($invoice_id){
            $invoices=invoices::onlyTrashed()->where("id","=",$invoice_id)->forceDelete();
            session()->flash('deleted_atchived_invoice');

        }
        else{
            session()->flash('fail_deleted_atchived_invoice');
        }

        return redirect()->route('archives.index');
    }
}
