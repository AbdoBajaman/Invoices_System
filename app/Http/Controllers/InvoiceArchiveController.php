<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class InvoiceArchiveController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return [
            new Middleware('permission:استرجاع الارشفة',only:['update']),
            new Middleware('permission:حذف الارشفة',only:['destroy']),
            new Middleware('permission:الفواتير المؤرشفة',only:['index']),


        ];
    }
=======

class InvoiceArchiveController extends Controller
{
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a
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
<<<<<<< HEAD

     //استرجاع الفاتوره
=======
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a
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
