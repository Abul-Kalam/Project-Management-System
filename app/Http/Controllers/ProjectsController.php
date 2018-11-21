<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Company;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $projects = Project::where('user_id', Auth::user()->id)->get();
            return view('projects.index' , ['projects'=>$projects]);
        }
        return view('auth.login');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $company_id = null )
    {

        $companies = null;
        if(!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        //dump($id);
        return view('projects/create',['company_id'=>$company_id,'companies'=>$companies]);
       //echo "ok";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if(Auth::check()){
           $project = Project::create([
               'name' => $request->input('name'),
               'description' => $request->input('description'),
               'company_id' => $request->input('company_id'),
               'user_id' => Auth::user()->id
           ]);

           if($project){
               return redirect()->route('projects.show', ['project'=> $project->id])
               ->with('success','project created successfully');
           }
       }

       return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
       // $project = Project::where('id',$project->id)->first();
       $project = Project::findOrFail($project->id);
       $comments = $project->comments;
        return view('projects.show',['project'=> $project,'comments'=> $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::findOrFail($project->id);
        return view('projects.edit',['project'=> $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $projectUpdate = Project::where('id', $project->id)
                                ->update([
                                    'name'=>$request->input('name'),
                                    'description'=>$request->input('description')
                                ]);
        if($projectUpdate){
            return redirect()->route('projects.show',['project'=>$project->id])
            ->with('success','project update successfully');
        } 
        return redirect()->withInput();                     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $projectFind = Project::findOrFail($project->id);
        if($projectFind->delete()){
            return redirect()->route('projects.index',['project'=>$project->id])
            ->with('success','project delete successfully');
        }
        return redirect()->withInput()->with('errors','project could not be deleted');
    }
}
