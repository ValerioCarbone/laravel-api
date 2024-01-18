<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Type;
use App\Models\Admin\Project;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function show(Type $type)
    {
        $projects = Project::with('technologies')->where('type_id', $type->id)->orderBy('updated_at', 'desc')->paginate(12);

        return response()->json([
            'projects' => $projects,
            'type' => $type
        ]);
    }
}
