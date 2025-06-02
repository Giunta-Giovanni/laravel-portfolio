<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // prendo tutti i projects dal db
        $projects = Project::with(['type'])->get();


        return response()->json(
            [
                'success' => true,
                'data' => $projects
            ]
        );
    }

    public function show(Project $project)
    {
        return response()->json([
            'success' => true,
            'data' => $project->load('type', 'technologies')
        ]);
    }
}
