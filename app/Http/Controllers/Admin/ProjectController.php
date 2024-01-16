<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\support\Str;
use illuminate\validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Project::all();
        return view('admin.projects.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string|unique:projects',
            'content' => 'nullable|min:5|string',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');

        $new_project = Project::create($data);

        if ($request->has('technologies')) {
            $new_project->tags()->attach($data['technologies']);
        }

        return redirect()->route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => ['required', 'max:255', 'string', Rule::unique('projects')->ignore($project->id)],
            'content' => 'nullable|min:5|string',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        $project->update($data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']);
        } else {
            // $project->technologies()->sync([]);
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->sync([]);
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
