<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Language;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
       $this->authorizeResource(Project::class,'project');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=User::find(auth()->user()->id);

        if ($user->isSupervisor()) {
            $projects=Project::where('supervisor',$user->name)->get();

           return view('admin.student.project-index',compact('projects'));
        }
        
       $projects=Project::all();
       


        return view('admin.student.project-index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        $languages=Language::all();
        $files=File::all();

        return view('admin.student.project-create',compact('languages','files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
       

       $project=new Project($request->all());
       $project->user_id=auth()->user()->id;
       $project->save();
       $project->languages()->sync($request->languages);

      
       return redirect(route('projects.index'))->with('info','project was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        $project=Project::with('activities')->find($project->id);
        $files=File::where('project_id',$project->id)->get();
        
      
       
        return view('admin.student.project-show',compact('project','files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {   
        $files=File::all();
        $languages=Language::all();
         
        return view('admin.student.project-edit',compact('project','languages','files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
     
        
        $project=Project::find($project->id);
        $project->user_id=auth()->user()->id;
        $project->name=$request->name;
        $project->desc=$request->desc;
        $project->status=$request->status;
        $project->domain=$request->domain;
        $project->supervisor=$request->supervisor;
        $project->repoUrl=$request->repoUrl;
        $project->estBudget=$request->estBudget;
        $project->amountSpent=$request->amountSpent;
        $project->duration=$request->duration;
        $project->liveUrl=$request->liveUrl;
        $project->update();
        $project->languages()->sync($request->languages);
        
        return redirect(route('projects.show',$project->id))->with('info','project was updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        Project::find($project->id)->delete();
        return redirect()->back();
    }
}
