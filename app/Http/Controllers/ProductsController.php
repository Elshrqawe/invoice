<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Products;
use App\Models\sections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sections = sections::all();

        $Products = Products::all();

        return view('Products.Products',compact('Products','Sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        try {

            $Sections = new Products();
            $Sections->product_name = ['en' => $request->product_name_en, 'ar' => $request->product_name,];
            $Sections->description = ['en' => $request->description_en, 'ar' => $request->description,];
            $Sections->section_id = $request->section_id;

            $Sections->save();

            session()->flash('Add','تم اضافه القسم بنجاح');
            return redirect('products');

        } catch (\Exception $ex) {
            //عرض  ايرور  لارفيل
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request)
    {

        try {
            $validated = $request->validated();

            $Sections = Products::findorfail($request->id);
            $Sections->product_name = ['en' => $request->product_name_en, 'ar' => $request->product_name,];
            $Sections->description = ['en' => $request->description_en, 'ar' => $request->description,];
            $Sections->section_id = $request->section_id;

            $Sections->save();

            session()->flash('Add','تم تحديث المنتج بنجاح');
            return redirect('products');

        } catch (\Exception $ex) {
            //عرض  ايرور  لارفيل
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);

        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


          Products::findOrFail($request->id)->delete();

        session()->flash('delete', 'تم حذف القسم بنجاح');
        return redirect('products');

    }
}
