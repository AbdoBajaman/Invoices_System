<?php

namespace App\Http\Controllers;

use App\Models\invoices_attachments;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;

class InvoicesAttachmentsController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            new Middleware('permission:اضافة مرفق', only: ['store']),
            new Middleware('permission:حذف المرفق', only: ['destroy']),


        ] ;
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
        // dd($request->all());
        $request->validate([
            'file_name' => 'mimes:pdf,jpeg,png,jpg',

        ], [
            'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',

        ]);

        if ($request->hasFile('file_name')) {
            $file = $request->file('file_name');
            $file_name = $file->getClientOriginalName();
            // dd($file_name);
            $invoice_attachment = invoices_attachments::create(
                [
                    'File_Name' => $file_name,
                    'Invoice_Id' => $request->invoice_id,
                    'invoice_number' => $request->invoice_number,
                    'created_by' => auth()->user()->name,
                ]
            );
            $filenames = str_replace(' ','_', $file_name);
            $path = $file->storeAs('Attachmentfiles/Attachments-'.$request->invoice_number,$filenames );
        }

        return back()->with('Add', 'تم اضافه مرفق بنجاح');

        // dd($request->file_name);
        // if($request->hasFile('file_name')){
        //     // dd('true');
        //     $file = $request->file('file_name');
        //     //! this is get the all file name like image.png
        //     $filename = $file->getClientOriginalName();
        //     // dd($file);

        //     // dd($invoice_id. "=>".$invoice_number);
        //     $invoice_attachment=invoices_attachments::create(
        //         [
        //             'File_Name' =>$file,
        //             'Invoice_Id'=>$request->invoice_id,
        //             'invoice_number'=> $request->invoice_number,
        //             'created_by'=>auth()->user()->name,
        //         ]
        //         );
        //     //!this is get the extenstion .png
        //     // $extension = $file->getClientOriginalExtension();
        //     // dd($filename.'.=>'.$extension);
        //     dd('worked');
        //     $filenames = str_replace(' ','_', $filename);
        //     $path = $file->storeAs('Attachmentfiles/Attachments-'.$$request->invoice_number,$filenames );


        // dd($path. '=>this is filename with replace =>'.$filenames);



    }


    /**
     * Display the specified resource.
     */
    public function show(invoices_attachments $invoices_attachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoices_attachments $invoices_attachments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices_attachments $invoices_attachments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $attachment = invoices_attachments::find($request->file_id);


        if ($attachment) {
            $file_path = storage_path('app/public/Attachmentfiles/Attachments-' . $request->invoice_number . '/' . $request->file_name);
            if (file_exists($file_path)) {

                //! delete file from server
                unlink($file_path);
            }

            //? delete from database
            $attachment->delete();

            return redirect()->back()->with('delete', 'تم حذف المرفق بنجاح');
        }

        return redirect()->back()->with('delete', 'فشل حذف المرفق بنجاح');
    }
    public function DownloadFile($invoice_number, $file_name)
    {

        $file_path = 'Attachmentfiles/Attachments-' . $invoice_number . '/' . $file_name;

        if (Storage::exists($file_path)) {
            return Storage::download($file_path);
        } else {
            return abort(404, 'File not found');
        }
    }
    public function OpenFile($invoice_number, $file_name)
    {
        $file_path = storage_path('app/public/Attachmentfiles/Attachments-' . $invoice_number . '/' . $file_name);

        if (!file_exists($file_path)) {
            abort(404, 'File not found');
        }

        $mimeType = mime_content_type($file_path);
        return response()->file($file_path, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($file_path) . '"'
        ]);
    }
}
