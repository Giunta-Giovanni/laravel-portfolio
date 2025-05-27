<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ricaviamoci tutti i progetti dal modulo Project
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        // dump($types);
        return view('projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $data = $request->all();

        // dd($data);

        $newProject = new Project();

        $newProject->title = $data['title'];
        $newProject->client = $data['client'];
        $newProject->start_date = $data['start_date'];
        $newProject->end_date = $data['end_date'];
        $newProject->state = $data['state'];
        $newProject->description = $data['description'];
        $newProject->type_id = $data['type'];



        // dd($newProject);
        $newProject->save();

        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //prendiamo il progetto con quello specifico id dal Db
        // $project = Project::find($id);
        // dump($project->type);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // dd($project);
        $types = Type::all();
        return view('projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // dump($project);
        // return 'sei nella update';
        $data = $request->all();

        // dd($data);
        $project->title = $data['title'];
        $project->client = $data['client'];
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        $project->state = $data['state'];
        $project->description = $data['description'];
        $project->type_id = $data['type'];

        // dump($project);

        $project->update();

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // dump($project);
        $project->delete();

        // facciamo il redirect
        return redirect()->route('projects.index');
    }
}
