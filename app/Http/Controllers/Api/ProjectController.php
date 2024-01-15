<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Project;
use PDO;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $results = Project::all();

        return response()->json([
            'results' => $results,
            'success' => true
        ]);
    }
}
