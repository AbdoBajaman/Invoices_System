<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\sections;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Products::orderBy("id", "desc")->get();
        $sections = sections::all();
        $sections_count=sections::count();
        // dd($products);
        // dd($sections);
        return view('products.products', compact("products", "sections"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // dd($request->section_name);
        // dd($data);
        $section_Id = sections::where('section_name', '=', $request->section_name)->pluck('id')->first();
        //! pluck return collection like [] //

        // dd($section_Id);
        if ($section_Id) {

            $validate_data = $request->validate([
                'product_name'=> 'required|max:255',
                'description' => 'required',
            ], [
                'product_name.required' => 'يرجى ادخال اسم المنتج ',
                // 'product_name.unique'=> 'اسم المنتج مسجل مسبقاً',

                'description' => 'يرجى ادخال الملاحظات',

            ]);
            $product = products::create([
                'product_name' => $request->product_name,
                'description' => $request->description,
                'section_id' => $section_Id,
            ]);
            return redirect()->route('products.index')->with('success', 'تم اضافه منتج بنجاح');

        }

        // else{
        //     return redirect()->route('products.index')->with('error', 'فشل في الاضافه');


        // }


    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //

        $id= $request->id;
        $section_Id = sections::where('section_name', '=', $request->section_name)->pluck('id')->first();
        if ($section_Id) {


        $validate_data= $request->validate([
            'product_name'=> 'required|max:255',
            'description'=> 'required',
            'section_name'=>'required'

        ],[
            'product_name.required'=> 'يرجى تعديل اسم المنتج ',
            // 'product_name.unique'=> 'اسم المنتج مسجل مسبقاً',
            'description'=> 'يرجى تعديل الملاحظات',

        ]);
        $product = products::find($id);
        $product->update([
            'product_name'=> $request->product_name,
            'description'=> $request->description,
            'section_id'=> $section_Id,
            ]);
            return redirect()->route('products.index')->with('success', 'تم تعديل منتج بنجاح');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

            //    dd('this is id ='. $id .'=>worked');
            $product = products::find($id);
            if ($product) {

                $product->delete();
                return redirect()->route('products.index')->with('delete', 'تم حذف المنتج بنجاح');
            } else {
                return redirect()->route('products.index')->with('delete', 'فشل الحذف حاول مجدداً');
            }
    }
}
