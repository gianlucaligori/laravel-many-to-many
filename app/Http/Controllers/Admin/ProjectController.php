<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    private $validations = [
        'title'     => 'required|string|min:5|max:100',
        'image'        => 'image|max:200',
        'date' => 'required|date',
        'name'   => 'required|string',
        'surname'   => 'required|string',
        'description'   => 'required|string|min:10|max:1000',
    ];

    private $validation_messages = [
        'required'  => 'Il campo :attribute è obbligatorio',
        'min'       => 'Il campo :attribute deve avere almeno :min caratteri',
        'max'       => 'Il campo :attribute non può superare i :max caratteri',

    ];
    public function index()
    {
        $projects = project::paginate(5);

        return view('admin.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    public function store(Request $request)
    {
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $imagePath = Storage::put('uploads', $data['image']);

        $newProject = new Project();

        $newProject->type_id        = $data['type_id'];
        $newProject->title          = $data['title'];
        $newProject->image          = $imagePath;
        $newProject->date           = $data['date'];
        $newProject->name           = $data['name'];
        $newProject->surname        = $data['surname'];
        $newProject->description    = $data['description'];
        $newProject->save();

        return to_route('admin.projects.show', ['project' => $newProject]);
    }

    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->title         = $data['title'];
        $project->date          = $data['date'];
        $project->name          = $data['name'];
        $project->surname       = $data['surname'];
        $project->description   = $data['description'];
        $project->update();

        $project->technologies()->sync($data['technologies'] ?? []);

        return  redirect()->route('admin.projects.index', ['project' => $project]);
    }

    public function destroy(Project $project)
    {
        // Rimuovi le dipendenze nella tabella project_technology
        $project->technologies()->detach();

        // Elimina il progetto
        $project->delete();

        return redirect()->route('admin.projects.index')->with('delete_success', $project);
    }
}
