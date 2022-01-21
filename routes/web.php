<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportsController;
use App\Models\Activity;
use App\Models\File;
use App\Models\Project;
use App\Models\User;
use App\Notifications\StudentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Juanparati\Copyscape\Facades\CopyscapeClient;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
  $projects=Project::paginate(6);
    return view('client.index',compact('projects'));
});

Route::get('/dashboard', function () {
    return view('admin.views.index');
})->middleware(['auth'])->name('dashboard');



Route::get('notification',function()
{
 $users=User::all();
 return  view('admin.student.send-mail',compact('users'));
})->name('notification.compose');

//send notification
Route::post('send',function(Request $request)
{
  
  $retVal = ($request->to==' ') ? true: false ;
  if ($retVal) {
   $users=User::whereHas('projects')->get();
      $users->each(function($user)use($request) {
            $details=[
              'to'=>$user->email,
              'subject'=>$request->subject,
              'body'=>$request->body,
            ];
        $user->notify(new StudentNotification($details));
        });
 
  
  } else {
    $usersCount= (collect($request->users)->count()>1) ?true  : false;
      if ($usersCount) {
            $users=User::whereIn('email',$request->users)->get();
         
            $users->each(function($user)use($request) {
                               $details=[
                                  'to'=>$user->email,
                                  'subject'=>$request->subject,
                                  'body'=>$request->body,
                                ];
              $user->notify(new StudentNotification($details));
            });
      } else {
      
        $user=User::whereIn('email',$request->users)->first();
        $details=[
          'to'=>$user->email,
          'subject'=>$request->subject,
          'body'=>$request->body,
        ];
        $user->notify(new StudentNotification($details));
      }
      
  }
  
  return redirect()->back()->with("status"," sent");

})->name('notification.send');


/*inbox*/
Route::get('inbox',function(){
  $user=User::find(auth()->user()->id);
   $notifications=$user->notifications;
  return view('admin.student.notification-inbox',compact('notifications'));
})->name('notification.inbox');



require __DIR__.'/auth.php';
Route::resource('projects',ProjectController::class);
Route::resource('files',FileController::class);
Route::resource('languages',LanguageController::class);
Route::resource('activities',ActivityController::class);

Route::resource('files.reports',ReportsController::class);

Route::get('download/{file}',function($file){
      $file=File::find($file);
      $url=Storage::url($file->project->user->id.'/'.$file->name);
     // return response()->file($url);

      return response()->download($url);
})->name('download');

Route::get('archive',function(){
  $projects=Project::where('status','completed')->with('languages')->get();
  return view('admin.student.projects-archive',compact('projects'));

})->name('project.archive');

Route::get('mail-read/{id}',function($id){
  $user=User::find(auth()->user()->id);
  $notification=$user->notifications->find($id);
  

  return view('admin.student.read-mail',compact('notification'));

})->name('read.mail');