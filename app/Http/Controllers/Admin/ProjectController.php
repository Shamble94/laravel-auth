<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderByDesc("id")->get();
        return view ("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->all();

        $project = new Project();

        if($request->hasFile("cover_image")){
            $path = Storage::disk("public")->put("project_images", $form_data["cover_image"]);
            $form_data["cover_image"] = $path;
        }

        $slug = Str::slug($form_data["name"], "-");
        $form_data["slug"] = $slug;
        $project->fill($form_data);
    
        $project->slug = $slug;
       
        $project->save();

        return redirect()->route("admin.projects.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view ("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view ("admin.projects.edit", compact ("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();


        $exists = Project::where("name", "LIKE", $form_data["name"])
        ->where("id", "!=", $project->id)->get();
        
        if($request->hasFile("cover_image")){
            if($project->cover_image != null){
                Storage::delete($project->cover_image);
            }
        $path= Storage::disk("public")->put("project_images", $form_data["cover_image"]);
        $form_data["cover_image"] = $path;
        
        };

        $slug = Str::slug($form_data["name"], "-");
        $form_data["slug"] = $slug;
        $project->slug = $slug;
       
        $project->update($form_data);

        return redirect()->route("admin.projects.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
      
        if($project->cover_image != null){
            Storage::disk("public")->delete($project->cover_image);
        }
        $project->delete();
        return redirect()->route("admin.projects.index", ["project" => $project]);
    }
}
