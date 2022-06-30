<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "response" => Project::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newProject = Project::create([
                            "title" => $request->title,
                            "description" => $request->description,
                            "image_link" => $request->image_link,
                            "live_url" => $request->live_url,
                            "github_url" => isset($request->github_url) ? $request->github_url : null,
                            "roles_json" => $request->roles_json,
                            "technologies_json" => $request->technologies_json,
                            "is_featured" => $request->is_featured,
                            "order" => $request->order,
        ]);

        return response()->json([
            "message" => "Project added successfully",
            "response" => $newProject,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return response()->json([
            "response" => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newProject = [
                        "title" => $request->title,
                        "description" => $request->description,
                        "image_link" => $request->image_link,
                        "live_url" => $request->live_url,
                        "github_url" => isset($request->github_url) ? $request->github_url : null,
                        "roles_json" => $request->roles_json,
                        "technologies_json" => $request->technologies_json,
                        "is_featured" => $request->is_featured,
                        "order" => $request->order,
        ];

        Project::find($id)->update($newProject);

        return response()->json([
            "response" => "Project updated successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return response()->json([
            "response" => "Project deleted successfully",
        ]);
    }

    public function featured(){
        $featuredProjects = Project::where("is_featured", true)->orderBy("order", "asc")->get();

        return response()->json([
            "response" => $featuredProjects,
        ]);
    }


    public function updateOrder(Request $request){
       $idsToOrder = $request->ids_to_order;
       foreach ($idsToOrder as $id => $order) {
            Project::find($id)->update(["order" => $order]);
       } 

       return response()->json([
            "response" => "Order updated successfully",
       ]);
    }

    public function updateFeatured(Request $request, $id){
        $is_featured = $request->is_featured;
        Project::find($id)->update(["is_featured" => $is_featured]);

        return response()->json([
            "response" => "Update successful",
       ]);
    }

}
