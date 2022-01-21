<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Project;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function index()
    {
        $activities=Activity::with('project')->get();
       return view('admin.student.activities-index',compact('activities'));
 
    }
    public function create()
    {
         $projects=Project::all();
        return view('admin.student.activities-create',compact('projects'));
    }
   
    public function store(Request $request)
   {
        Activity::create($request->all());
        return redirect()->back()->with('status','Activity was created successfully');

   }
   public function edit(Activity $activity)
   {
    $projects=Project::all();
    $activity=Activity::find($activity->id);

    return view('admin.student.activities-edit',compact('projects','activity'));
   }  
   
   public function update(Activity $activity,Request $request)
   {
       $activity=Activity::find($activity->id)->update($request->all());
    return redirect()->to(route('activities.index'))->with('status','Activity was updated successfully');
   } 
   
   
   public function destroy(Activity $activity)
   {
      
        Activity::find($activity->id)->delete();
        return redirect()->back()->with('status','Activity was deleted');

   }
}
