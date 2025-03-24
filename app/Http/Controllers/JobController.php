<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('employer')->latest()->simplePaginate(3); //or paginate(3)

    return view('jobs.index', ['jobs'=>$jobs]);
    }
    public function create(){
        return view('jobs.create');
    }
    public function show(Job $job){
        return view('jobs.show',['job'=>$job]);
    }
    public function store(){
        request()->validate([
            'title'=>['required'],
            'salary'=>['required']
        ]);
    
     $job = Job::create([
        'title'=>request('title'),
        'salary'=>request('salary'),
        'employer_id'=> 1,
        ]);
        Mail::to($job->employer->user->email)->queue(new JobPosted($job));

    
        return redirect('/jobs');
    }
    public function edit(Job $job){
        //Authorization-also check AppServiceProvider.php for the remaining authorization,
        //go to where you have your edit code e.g show.blade.php in this case and wrap the edit code with @can or @cannot directive
        //Now, check middleware in web.php, it has handled the gate method

        
        // Gate::authorize('edit-job', $job);
        
        
        return view('jobs.edit',['job'=>$job]);
    }
    public function update(Job $job){
          //validate
    request()->validate([
        'title'=>['required'],
        'salary'=>['required']
    ]);

    //authorize
    //update the job
    

    $job-> update(
            [
            'title' => request('title'),
            'salary' => request('salary'),
            
            ]
        );
    //redirect to the jobs page
    return redirect('/jobs/'.$job->id);
        
    }
    public function destroy(Job $job){
        //authorize
    //delete
     $job->delete();
     //redirect
 
     return redirect('/jobs');
    }
}
