<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $results = Project::with('type', 'technologies')->paginate(15);

        return response()->json([
            'results' => $results,
            'success' => true
        ]);
    }

    public function show(Project $project)
    {
        // $project = Project::with('type','technologies')->where('slug',$slug)->first();
        $project->load('type', 'technologies');

        return response()->json([
            'project' => $project
        ]);
    }
}
