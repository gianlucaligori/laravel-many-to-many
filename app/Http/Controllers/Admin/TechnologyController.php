<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;


class TechnologyController extends Controller
{

    private $validations = [
        'technology'     => 'required|string|min:2|max:10',

    ];

    private $validation_messages = [
        'required'  => 'Il campo :attribute è obbligatorio',
        'min'       => 'Il campo :attribute deve avere almeno :min caratteri',
        'max'       => 'Il campo :attribute non può superare i :max caratteri',

    ];

    public function index()
    {
        $technologies = Technology::paginate(10);
        return view('admin.technologies.index', compact('technologies'));
    }



    public function create()
    {
        return view('admin.technologies.create');
    }


    public function store(Request $request)

    {

        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $newTechnology = new Technology();

        $newTechnology->technology     = $data['technology'];
        $newTechnology->save();


        return to_route('admin.technologies.show', ['technology' => $newTechnology]);
    }


    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }


    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }



    public function update(Request $request, Technology $technology)
    {



        $data = $request->all();

        $technology->technology = $data['technology'];

        $technology->update();

        return  redirect()->route('admin.technologies.index', ['technology' => $technology]);
    }



    public function destroy(Technology $technology)
    {
        if ($technology->project) {
            foreach ($technology->project as $project) {
                $project->technology_id = 1;
                $project->update();
            }
        }






        $technology->delete();

        return to_route('admin.technologies.index')->with('delete_success', $technology);
    }
}
