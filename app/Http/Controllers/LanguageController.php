<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages=Language::all();
       

        return view('admin.student.language-index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.student.language-create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       if($request->hasFile('logo'))
       {
           $logo=$request->file('logo');
         
          if ( $logo->getMimeType()=="image/jpeg"||$logo->getMimeType()=="image/png") {
              $name=$logo->getClientOriginalName();
              $imageUrl=$logo->getClientOriginalName();

              $logo->storeAs('public',$name);


              $language=new Language();
              $language->desc=$request->desc;
              $language->imageUrl=$imageUrl;
              $language->name=$request->name;
              $language->save();
              return redirect(route('languages.index'));
             

           
          }
          else{
              return redirect()->back()->with('info','please upload file with png or jpeg file extension');
          }

       }else{
           return redirect()->back()->with('info','logo image is required');

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
       //return view('',$language);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //

        return view('admin.student.language-edit',compact('language'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        //
    if($request->hasFile('logo'))
       {
           $logo=$request->file('logo');
         
          if ( $logo->getMimeType()=="image/jpeg"||$logo->getMimeType()=="image/png") {
              $name=$logo->getClientOriginalName();
              $imageUrl=$logo->getClientOriginalName();

              $logo->storeAs('public',$name);


              $language=Language::find($language->id);
              $language->desc=$request->desc;
              $language->imageUrl=$imageUrl;
              $language->name=$request->name;
              $language->update();
              return redirect(route('languages.index'));
             

           
          }
          else{
              return redirect()->back();
          }

       }else{
           return redirect()->back();

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
        Language::find($language->id)->delete();
        return redirect(route('languages.index'));
    }
}
