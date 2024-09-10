<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;

class InvoiceReportsController extends Controller
{


    public function index()
    {
        return view('reports.invoices_reports');
    }
    public function Search_invoices(Request $request){

        $rdio = $request->rdio;

        // dd($rdio);

     // في حالة البحث بنوع الفاتورة

        if ($rdio == 1) {


     // في حالة عدم تحديد تاريخ

     if ($request->type && $request->start_at =='' && $request->end_at =='') {
        // dd('a');

               $invoices = invoices::select('*')->where('status','=',$request->type)->get();
               $type = $request->type;
            //    dd($invoices);
            //    dd($type);
               return view('reports.invoices_reports',compact('type'))->withDetails($invoices);
            }

            // في حالة تحديد تاريخ استحقاق
            else {

              $start_at = date($request->start_at);
              $end_at = date($request->end_at);
              $type = $request->type;



              $invoices = invoices::whereBetween('invoice_date',[$start_at,$end_at])->where('status','=',$request->type)->get();

              return view('reports.invoices_reports',compact('type','start_at','end_at'))->withDetails($invoices);

            }



        }

    //====================================================================

    // في البحث برقم الفاتورة
        else {

            $invoices = invoices::select('*')->where('invoice_number','=',$request->invoice_number)->get();
            return view('reports.invoices_reports')->withDetails($invoices);

        }



        }

}
