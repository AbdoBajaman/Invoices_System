<?php

namespace App\Http\Controllers;

use App\Exports\InvoiceExport;
use App\Mail\invoice_notify;
use App\Models\invoices;
use App\Models\invoices_attachments;
use App\Models\invoices_details;
use App\Models\products;
use App\Models\sections;
use App\Models\User;
use App\Notifications\Add_invoice;
use App\Notifications\invoice_notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class InvoicesController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware ('permission:قائمة الفواتير', only:['index']),
            new Middleware('permission:الفواتير المدفوعة', only: ['payed_invoice']),
            new Middleware('permission:الفواتير المدفوعة جزئيا', only:['partially_paid_invoices']),
            new Middleware('permission:الفواتير الغير مدفوعة', only : ['Due_invoices']),

            new Middleware ('permission:تغير حالة الدفع', only:['status_show','status_update']),
            new Middleware('permission:تصدير EXCEL', only : ['export']),
            new Middleware('permission:تعديل الفاتورة', only: ['edit', 'update']),
            new Middleware('permission:حذف الفاتورة', only: ['destroy']),
            new Middleware('permission:اضافة فاتورة', only: ['create', 'store']),

            // new Middleware('permission:عرض تفاصيل الفاتورة', only : ['show']),

            new Middleware('permission:طباعةالفاتورة', only :['print_invoice']),


        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $invoices = invoices::orderBy("id", "desc")->get();



        return view('invoices/invoices', compact('invoices'));
    }

    public function payed_invoices()
    {

        // return view('form-wizards');
        $invoices = invoices::orderBy('id', 'desc')->where('value_status', '=', 1)->get();


        return view("Invoices.payed_invoices", [
            "invoices" => $invoices
        ]);
    }
    public function Due_invoices()
    {
        $invoices = invoices::orderBy('id', 'desc')->where('value_status', '=', 2)->get();

        return view("Invoices.due_invoices", compact("invoices"));
    }
    public function partially_paid_invoices()
    {
        $invoices = invoices::orderBy('id', 'desc')->where('value_status', '=', 3)->get();

        return view("Invoices.partially_paid_invoices", [
            "invoices" => $invoices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $sections = sections::all();
        return view(
            'Invoices.Add_Invoice',
            compact('sections')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $section_name = sections::find($request->section_id)->pluck('section_name')->first();
        // dd($section_name);

        // dd($request->Discount)  ;
        $invoice_number = $request->invoice_number;

        $invoice = invoices::create([
            'invoice_number' => $invoice_number,
            'product' => $request->product,
            'section' => $section_name,
            'discount' => $request->Discount,
            'invoice_date' => $request->invoice_Date,
            'due_date' => $request->Due_date,
            'rate_tax' => $request->rate_tax,
            'section_id' => $request->section_id,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'value_tax' => $request->value_tax,
            'total' => $request->Total,
            'status' => 'غير مدفوعه',
            'value_status' => 2,
            'note' => $request->note,
            // 'user'=> auth()->user()->name,

        ]);
        $invoice_id = invoices::latest()->first()->id;
        // dd('this is lates'.$invoice_id);
        $invoice_details = invoices_details::create([
            'Invoice_Id' => $invoice_id,
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,
            'Section' => $section_name,
            'status' => 'غير مدفوعة',
            'value_status' => 2,
            'note' => $request->note,
            'user' => auth()->user()->name,

        ]);
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            //! this is get the all file name like image.png
            $filename = $file->getClientOriginalName();
            // dd($filename);

            // dd($invoice_id. "=>".$invoice_number);
            $invoice_attachment = invoices_attachments::create(
                [
                    'File_Name' => $filename,
                    'Invoice_Id' => $invoice_id,
                    'invoice_number' => $invoice_number,
                    'created_by' => auth()->user()->name,
                ]
            );


            //!this is get the extenstion .png
            // $extension = $file->getClientOriginalExtension();
            // dd($filename.'.=>'.$extension);
            $filenames = str_replace(' ', '_', $filename);
            $path = $file->storeAs('Attachmentfiles/Attachments-' . $invoice_number, $filenames);



            // dd($path. '=>this is filename with replace =>'.$filenames);



        }
        // dd(auth()->user()->name );
        // $user=auth()->user()->name;
        // $admin=User::first();
        // dd($admin);
        $super_Admins = User::whereJsonContains('roles_name', 'Super_Admin')->get();



          $user=$invoice_details->user;
        //   dd($user);
        // Debug the result
        // dd($superAdmins);
//
    // dd($invoice->id);
     //! Send notification via email
        Notification::send($super_Admins,new Add_invoice($invoice,$user) );
        // Notification::send($admin,new invoice_notification($invoice));
        // Mail::to('abdo99669@gmail.com')->send(new invoice_notify($invoice));
        // redirect()->route('invoices.index')->with('s', 'تم اضافه فاتوره بنجاح')
        return back()->with('success', 'تم اضافه فاتوره بنجاح');
        // dd($request->all());
        // $validate_data=$request->validate([
        //     ''=> 'required',
        //     ''=> '',
        //     ''=> ''

        // ],
        // [
        //     '
        //     '=> '',
        //     ''=> '',
        //     '
        //     '=> sections::all(),
        //     '
        //     '=> sections::all(),
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // dd('invoice controller');
        // $invoices = invoices::find($id);
        // $details_count = invoices_details::where('Invoice_Id', $id)->count();
        // $invoice_details = invoices_details::where('Invoice_Id', $id)->first();

        // // dd(''.$invoice_details->());
        // $invoice_attachments = invoices_attachments::where('Invoice_Id', $id)->first();
        // // dd($invoice_attachments);
        // // dd($invoice_details);
        // return view('Invoices.invoice_details', compact('invoices', 'invoice_details', 'invoice_attachments', 'details_count'));
    }

    public function status_show($id)
    {

        $invoices = invoices::find($id);
        return view('Invoices.status_update', compact('invoices'));
    }

    public function status_update(Request $request, $id)
    {


        $invoices = invoices::find($id);
        $section_name = sections::where('id', $request->section_id)->value('section_name');
        // dd($section_name);
        // dd($request->Status);
        // dd($invoice_details);
        if ($request->Status == 'مدفوعة') {
            $invoices->update([
                'Payment_Date' => $request->Payment_Date,
                'status' => $request->Status,
                'value_status' => 1,

            ]);
            invoices_details::create([
                'Invoice_Id' => $request->invoice_id,
                'Payment_Date' => $request->Payment_Date,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $section_name,
                'Value_Status' => 1,
                'payed_value' => $invoices->Amount_collection,

                'Status' => $request->Status,
                'user' => Auth::user()->name,
                'note' => $request->note,
            ]);
        } else {

            $invoices->update([
                'Payment_Date' => $request->Payment_Date,
                'status' => $request->Status,
                'value_status' => 3,
            ]);

            invoices_details::create([
                'Invoice_Id' => $request->invoice_id,
                'Payment_Date' => $request->Payment_Date,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $section_name,
                'Value_Status' => 3,
                'Status' => $request->Status,
                'payed_value' =>  $request->payed_value,

                'user' => Auth::user()->name,
                'note' => $request->note,
            ]);
        }
        return redirect()->route('invoices.index')->with('status_update', 'done');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($id);
        $invoices = invoices::find($id);
        $sections = sections::all();
        return view('Invoices.invoice_edit', compact('invoices', 'sections'));


        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());
        $section_name = sections::where('id', $request->section_id)->value('section_name');
        // dd('this is section id = >'.$request->section_id .'and this is section name'.$section_name);

        // dd($section_name);
        // dd($section_name);
        $invoice = invoices::find($id);
        $invoice->update([
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,
            'section' => $section_name,
            'discount' => $request->discount,
            'invoice_date' => $request->invoice_date,
            'due_date' => $request->due_date,
            'rate_tax' => $request->rate_tax,
            'section_id' => $request->section_id,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'value_tax' => $request->value_tax,
            'total' => $request->Total,
            'status' => 'غير مدفوعه',
            'value_status' => 2,
            'note' => $request->note,
            // 'user'=> auth()->user()->name,

        ]);
        $invoice_details = invoices_details::where('Invoice_Id', '=', $id)->first();
        $invoice_details->update([
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,

            'Section' => $section_name,
            'status' => 'غير مدفوعه',
            'value_status' => 2,
            'note' => $request->note,
            'user' => auth()->user()->name,
        ]);
        // if($request->hasFile('pic')){
        //     $file = $request->file('pic');
        //     //! this is get the all file name like image.png
        //     $filename = $file->getClientOriginalName();
        //     // dd($filename);

        //     // dd($invoice_id. "=>".$invoice_number);

        //     $invoice_attachment=invoices_attachments::where('id','=',$request->invoice_id)->first();

        //     $invoice_attachment->create(
        //         [
        //             'File_Name' =>$filename,
        //             'Invoice_Id'=>$id,
        //             'invoice_number'=> $$request->invoice_number,
        //             'created_by'=>auth()->user()->name,
        //         ]
        //         );
        //     //!this is get the extenstion .png
        //     // $extension = $file->getClientOriginalExtension();
        //     // dd($filename.'.=>'.$extension);
        //     $filenames = str_replace(' ','_', $filename);
        //     $path = $file->storeAs('Attachmentfiles/Attachments-'.$$request->invoice_number,$filenames );


        //     // dd($path. '=>this is filename with replace =>'.$filenames);



        // }
        return back()->with('edit', 'تم تعديل الفاتوره بنجاح');

        // dd($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // dd($request->invoice_id);
        $invoice_id = $request->invoice_id;
        $invoice = invoices::where('id', '=', $invoice_id)->first();
        $invoice_attachment = invoices_attachments::where('Invoice_Id', '=', $invoice_id)->get();

        $dir_path = '';

        $check_delete_or_archive = $request->page_id;
        if (!$check_delete_or_archive == 2) {
            foreach ($invoice_attachment as $attachment) {
                $directory_path = storage_path('app/public/Attachmentfiles/Attachments-' . $attachment->invoice_number);

                $dir_path = $directory_path;
                $file_path = $directory_path . '/' . $attachment->File_Name;
                if (!empty($attachment->invoice_number)) {


                    if (file_exists($file_path)) {
                        // dd($file_path);

                        //! delete file from server
                        unlink($file_path);
                    }
                }
            }

            // dd($dir_path);
            // dd($invoice_attachment->invoice_number);
            // dd(empty($invoice_attachment->invoice_number));
            // todo count(glob("$directory_path/*")) === 0 this check if ur directory has any files inside it
            // todo so count 0 that mean no file
            if (is_dir($dir_path) && count(glob("$dir_path/*")) === 0) {
                rmdir($dir_path);
            }
            $invoice->forcedelete();
            session()->flash('delete_invoice');

            return redirect()->route('invoices.index');
        } else {
            $invoice->delete();
            session()->flash('Archive_invoice');
            return back();
        }


        //
    }

    // public function archiev(Request $request){

    // }
    public function Get_Products($id)
    {
        $products = products::where('section_id', $id)->pluck('product_name', 'id');


        if ($products->isEmpty()) {
            return response()->json(['message' => 'لا يوجد منتجات لهذا القسم']);
        }

        return response()->json(['Products' => $products], 200);
    }
    public function print_invoice($id){
        $invoice=invoices::where('id', $id)->first();
        $invoice_details=invoices_details::latest()->where('Invoice_Id', $id)->first();

        return view('Invoices.print_invoice', compact('invoice','invoice_details'));
    }
    public function export(){
        $s=Role::all();
        return Excel::download(new InvoiceExport,'invoices.xlsx');
    }

}
