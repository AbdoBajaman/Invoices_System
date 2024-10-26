<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
<<<<<<< HEAD

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SectionsController extends Controller implements HasMiddleware
{




    public static function middleware(): array
    {
        return [
            new Middleware ('permission:الاقسام', only:['index']),
            new Middleware ('permission:تعديل قسم', only:['edit','update']),

            new Middleware('permission:اضافة قسم', only:['create', 'store']),
            // new Middleware('permission:تعديل مستخدم', ['only' => ['edit', 'update']]),
            new Middleware('permission:حذف قسم',only : ['destroy']),
        ];
    }



=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;
class SectionsController extends Controller
{
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::orderBy("id", "desc")->get();

        return view('sections.sections', ['sections' => $sections]);
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
        // $input = $request->all();
        // dd($request);
        $validate_data= $request->validate([
            'section_name'=> 'required|unique:sections|max:255',
            'description'=> 'required',
        ],[
            'section_name.required'=> 'يرجى ادخال اسم القسم ',
            'section_name.unique'=> 'اسم القسم مسجل مسبقاً',
            'description'=> 'يرجى ادخال الملاحظات',

        ]);
        $secrions = sections::create([
            'section_name' => $request->section_name,
            'description' => $request->description,
            'created_by' => Auth()->user()->name,
        ]);
        return redirect()->route('sections.index')->with('success', 'تم اضافه قسم بنجاح');

        // $Is_Exist = sections::where('Section_Name', $input['section_name'])->exists();
        // // dd($Is_Exist);
        // if ($Is_Exist) {
        //     session()->flash('warn', 'القسم مضاف مسبقاً');
        //     return redirect()->route('sections.index');
        // } else {



        //     $secrions = sections::create([
        //         'section_name' => $request->section_name,
        //         'description' => $request->description,
        //         'created_by' => Auth()->user()->name,
        //     ]);
        //     return redirect()->route('sections.index')->with('success', 'تم اضافه قسم بنجاح');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //

        $id = $request->id;
        $validate_data= $request->validate([
            'section_name'=> 'required|max:255|unique:sections,section_name,'.$id,
            'description'=> 'required',
        ],[
            'section_name.required'=> 'يرجى ادخال اسم القسم ',
            'section_name.unique'=> 'اسم القسم مسجل مسبقاً',
            'description'=> 'يرجى ادخال الملاحظات',

        ]);
        // $this->validate($request, [

        //     'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
        //     'description' => 'required',
        // ],[

        //     'section_name.required' =>'يرجي ادخال اسم القسم',
        //     'section_name.unique' =>'اسم القسم مسجل مسبقا',
        //     'description.required' =>'يرجي ادخال البيان',

        // ]);

        $sections = sections::find($id);
        $sections->update([
            'section_name' => $request->section_name,
            'description' => $request->description,
        ]);
        return redirect()->route('sections.index')->with('success', 'تم تعديل القسم بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)

    {
                // $section_Exist=sections::where('id','=',$id)->exist();



        //    dd('this is id ='. $id .'=>worked');
        $section = sections::find($id);
        if ($section) {

            $section->delete();
            return redirect()->route('sections.index')->with('delete', 'تم حذف القسم بنجاح');
        } else {
            return redirect()->route('sections.index')->with('delete', 'فشل الحذف حاول مجدداً');
        }
    }
}
