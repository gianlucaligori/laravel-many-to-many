@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th class="w-75" scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Collabs</th>
                    <th scope="col">Technology</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $project->title }}</th>
                    <td>{{ $project->type->type }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->date }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->surname }}</td>
                    <td>{{ $project->type->collabs }}</td>
                    <td>{{ implode(', ', $project->technologies->pluck('technology')->all()) }}</td>
                    <td>
                        <div class="d-flex justify-content-start">
                            <a class="btn btn-warning me-2"
                                href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">Edit</a>
                            <button type="button" class="js-delete btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-id="{{ $project->id }}">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
