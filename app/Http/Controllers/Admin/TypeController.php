<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Type $type)
    {
        return view('admin.type.show', compact('type'));
    }


    public function edit(Type $type)
    {
        //
    }



    public function update(Request $request, Type $type)
    {
        //
    }


    public function destroy(Type $type)
    {
        foreach ($type->project as $project) {
            $project->type_id = 1;
            $project->update();
        }

        $type->delete();

        return to_route('admin.type.index')->with('delete_success', $type);
    }
}
