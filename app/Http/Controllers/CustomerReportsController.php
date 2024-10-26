<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\sections;
use Illuminate\Http\Request;

class CustomerReportsController extends Controller
{
    public function index()
    {

        $sections = sections::all();
        return view('reports.customer_reports', compact('sections'));
    }


    public function search(Request $request)
    {


        // في حالة البحث بدون التاريخ


        // todo && same and operator also || same or operator but those &&,|| has the precedence الأولويه
        if ($request->Section && $request->product && $request->start_at == '' && $request->end_at == '') {


            $invoices = invoices::select('*')->where('section_id', '=', $request->Section)->where('product', '=', $request->product)->get();
            $sections = sections::all();
            return view('reports.customer_reports', compact('sections'))->withDetails($invoices);
        }


        // في حالة البحث بتاريخ

        else {

            $start_at = date($request->start_at);
            $end_at = date($request->end_at);

            $invoices = invoices::whereBetween('invoice_date', [$start_at, $end_at])->where('section_id', '=', $request->Section)->where('product', '=', $request->product)->get();
            $sections = sections::all();
            return view('reports.customer_reports', compact('sections'))->withDetails($invoices);
        }
    }
}
