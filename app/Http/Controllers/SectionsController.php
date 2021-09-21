<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionsRequest;
use App\Models\Products;
use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sections = sections::all();
        return view('sections.sections' , compact('Sections'));
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
    public function store(SectionsRequest $request)
    {
        try {

            $Sections = new sections();
            $Sections->section_name = ['en' => $request->section_name_en, 'ar' => $request->section_name,];
            $Sections->description = ['en' => $request->description_en, 'ar' => $request->description,];
            $Sections->Created_id = (Auth::user()->name) ;

            $Sections->save();

             session()->flash('Add','تم اضافه القسم بنجاح');
            return redirect('sections');

        } catch (\Exception $ex) {
            //عرض  ايرور  لارفيل
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(SectionsRequest $request, sections $sections)
    {
        try {

            $validated = $request->validated();
            $Section = sections::findOrFail($request->id);//ابحث  عن الايدي
            $Section->update([//التعديل
                $Section->section_name = ['ar' => $request->section_name, 'en' => $request->section_name_en],
                $Section->description = ['en' => $request->description_en, 'ar' => $request->description,],
                $Section->Created_id = (Auth::user()->name)


            ]);
            session()->flash('edit','تم تحديث القسم بنجاح');
            return redirect('sections');

        } catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Section_id = Products::where('section_id', $request->id)->pluck('section_id'); //دور في تيبول Products علي section_id

        if ($Section_id->count() == 0) { //لو  صفر يمكن  حذف المرحله

            $Sections = sections::findOrFail($request->id)->delete();
            session()->flash('delete','تم حذف القسم بنجاح');
            return redirect('sections');
        } else { //لو اكبر صفر لايمكن  حذف المرحله

            return redirect()->back()->withErrors(['error' => 'لايمكن حذف القسم . يجب حذف منتجاته اولا..!']);


        }

    }
}
