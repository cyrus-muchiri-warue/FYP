<?php

namespace App\Http\Controllers;
use App\Models\File;
use App\Models\Project;
use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use bsobbe\ithenticate\Ithenticate;
use Dotenv\Parser\Parser;
use Illuminate\Support\Facades\Log;
use Juanparati\Copyscape\Facades\CopyscapeClient;
use PhpOffice\PhpWord\IOFactory;

class FileController extends Controller
{
    public function __construct()
    {
       //$this->authorizeResource(File::class,'files');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       $files=File::withCount('reports')->get();       

        return view('admin.student.file-index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $projects=Project::all();
        return view('admin.student.file-create',compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
   /*check request has file*/
        if($request->hasFile('name')){
          
            $userId=auth()->user()->id;
            $uploadedFile=$request->file('name');
            
            $filename=$uploadedFile->getClientOriginalName();
         
            $uploadedFile->storeAs('public/'.$userId,$filename);
            /*store file*/
          $file=File::create(['name'=>$filename,
          'project_id'=>$request->project_id,
          'chapter'=>$request->chapter,
          ]);
    
          
          
          if ($uploadedFile->getClientOriginalExtension() != 'txt') {
            return redirect()->back()->with('status','The file format uploaded are not supported for quality check');
          } else {
              # code...
          
          
           
            /*read file contents*/

            $contents=file_get_contents($request->name->path());
           
           
         /*check plagarism */
         $results =CopyscapeClient::searchText($contents)
         ->request();
         Log::info($results);
         $queryWords=  $results['querywords'];
         $cost= $results['cost'];
         $countResult=$results['count'];
        for ($i=0; $i < $countResult ; $i++) { 
            $resultItem=$results['result'][$i];
            $url=$resultItem['url'];
            $title=$resultItem['title'];
            $textsnippet=$resultItem['textsnippet'];
            $htmlsnippet=$resultItem['htmlsnippet'];
            $minwordsmatched=$resultItem['minwordsmatched'];
            $viewurl=$resultItem['viewurl'];
              
            $file->reports()->create([
                'queryWords'=>$queryWords,
                'cost'=>$cost,
                'url' => $url,
                'title' =>$title,
                'textsnippet' =>$textsnippet,
                'htmlsnippet' =>$htmlsnippet,
                'minwordsmatched' =>$minwordsmatched,
                'viewurl' =>$viewurl,
            ]);
        }
   
        

           
        return redirect()->back()->with('status','File created successfully');
    }
            

        }else{
           return  redirect()->back()->with('status','missing file');
        }

        
        
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //



       
       /* $file=File::find($file->id);
       $url=Storage::url(auth()->user()->id.'/'.$file->name);*/
       
       
        $reports=Reports::where('file_id',$file->id)->get();
    
        return view('admin.student.report-index',['reports'=>$reports]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
        
        $projects=Project::all();
        return view('admin.student.file-edit',compact('file','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        
        if($request->hasFile('name')){
            /*request has name and store*/
            $userId=auth()->user()->id;
            $uploadedFile=$request->file('name');
            $filename=$uploadedFile->getClientOriginalName();
            $uploadedFile->storeAs('public/'.$userId,$filename);
            /*update file*/

            
            $file=File::find($file->id);
           
            $file->update(
                [
                    'name'=>$filename,
                    'project_id'=>$request->project_id,
                    'chapter'=>$request->chapter,
                ]
            );
            if ($uploadedFile->getClientOriginalExtension() !='txt') {
               return  redirect()->back()->with('status','The uploaded file format are not supported for uniqness checking');
            } else {
                # code...
            
            
              /*read file contents*/

              $contents=file_get_contents($request->name->path());
               /*check plagarism */
          $results =CopyscapeClient::searchText($contents)
          ->request();
          Log::info($results);
          /*serialize results*/
          $queryWords=  $results['querywords'];
          $cost= $results['cost'];
          $countResult=$results['count'];
         for ($i=0; $i < $countResult ; $i++) { 
             $resultItem=$results['result'][$i];
             $url=$resultItem['url'];
             $title=$resultItem['title'];
             $textsnippet=$resultItem['textsnippet'];
             $htmlsnippet=$resultItem['htmlsnippet'];
             $minwordsmatched=$resultItem['minwordsmatched'];
             $viewurl=$resultItem['viewurl'];
               
             $file->reports()->update([
                 'queryWords'=>$queryWords,
                 'cost'=>$cost,
                 'url' => $url,
                 'title' =>$title,
                 'textsnippet' =>$textsnippet,
                 'htmlsnippet' =>$htmlsnippet,
                 'minwordsmatched' =>$minwordsmatched,
                 'viewurl' =>$viewurl,
             ]);
         }
           
            return redirect()->back()->with('status','you can now check the file plagarism report');
        }

        }else{
           return  redirect()->back()->with('status','missing file');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
        File::find($file->id)->delete();
        return redirect(route('files.index'));
    }
}
