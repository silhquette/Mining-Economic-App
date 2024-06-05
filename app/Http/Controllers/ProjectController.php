<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Repositories\Project\ProjectRepository;

class ProjectController extends Controller
{
    /**
     * Initialize project repository
     *
     * @var mixed
     */
    protected $projectRepository;
    
    /**
     * __construct method
     *
     * @param  mixed $projectRepository
     * @return void
     */
    public function __construct(ProjectRepository $projectRepository)
    {
      $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectRepository->all();
        return view('project.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validate();

        Project::create($validated);

        return redirect()->route('project.index')->with(['success' => 'Project berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
