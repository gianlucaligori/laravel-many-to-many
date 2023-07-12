@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th scope="col">Type</th>
                    <th scope="col">Collabs</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $type->type }}</td>
                    <td>{{ $type->collabs }}</td>
                    <td>{{ implode(', ', $project->technologies->pluck('technology')->all()) }}</td>
                    <td>
                        <div class="d-flex justify-content-start">
                            <a class="btn btn-warning me-2"
                                href="{{ route('admin.types.edit', ['type' => $type->id]) }}">Edit</a>
                            <button type="button" class="js-delete btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-id="{{ $type->id }}">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
