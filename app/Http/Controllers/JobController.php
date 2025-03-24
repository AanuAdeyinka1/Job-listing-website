<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('Employer')->latest()->simplePaginate(3); //or paginate(3)

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
    
     Job::create([
        'title'=>request('title'),
        'salary'=>request('salary'),
        'employer_id'=> 1,
        ]);
    
        return redirect('/jobs');
    }
    public function edit(Job $job){
        //Authorization

        Gate::define('edit-job', function(User $user, Job $job){
        
            return $job->employer->user->is($user);
        

        });
        if(!Auth::check()){
            return redirect('/login');

        }
       Gate::authorize('edit-job', $job);
        
        
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
