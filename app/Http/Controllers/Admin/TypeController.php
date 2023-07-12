<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::paginate(5);

        return view('admin.types.index', compact('types'));
    }


    public function create()
    {
        return view('admin.types.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $newType = new Type();

        $newType->type          = $data['type'];
        $newType->collabs          = $data['collabs'];
        $newType->save();
        return to_route('admin.types.show', ['type' => $newType]);
    }


    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }


    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }



    public function update(Request $request, Type $type)
    {
        $data = $request->all();
        $type->type         = $data['type'];
        $type->collabs         = $data['collabs'];
        $type->update();
        return to_route('admin.types.show', ['type' => $type]);
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
