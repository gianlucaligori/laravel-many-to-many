<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;


class TechnologyController extends Controller
{
    public function index()
    {
        $technology = Technology::paginate(5);

        return view('admin.technologies.index', compact('technologies'));
    }


    public function create()
    {
        return view('admin.technologies.create', compact('technologies'));
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $newTechnology = new Technology();

        $newTechnology->technology     = $data['technology'];
        $newTechnology->save();


        return to_route('admin.technologies.show', ['technologies' => $newTechnology]);
    }


    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }


    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technologies'));
    }



    public function update(Request $request, Technology $technology)
    {
        $data = $request->all();

        $newTechnology = new Technology();

        $newTechnology->technology     = $data['technology'];
        $newTechnology->update();
    }


    public function destroy(Technology $technology)
    {
        foreach ($technology->project as $project) {
            $project->technology_id = 1;
            $project->update();
        }

        $technology->delete();

        return to_route('admin.type.index')->with('delete_success', $technology);
    }
}
