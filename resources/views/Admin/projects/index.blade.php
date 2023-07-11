@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        @if (session('delete_success'))
            @php $project = session('delete_success') @endphp
            <div class="alert alert-danger">
                The project "{{ $project->title }}" has been deleted forever
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th class="w-50" scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->title }}</th>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->date }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->surname }}</td>
                        <td>
                            <a class="btn btn-primary"
                                href="{{ route('admin.projects.show', ['project' => $project->id]) }}">View</a>
                            <a class="btn btn-warning"
                                href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">Edit</a>
                            <button type="button" class="btn btn-danger js-delete" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-id="{{ $project->id }}">
                                Delete
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete confirmation</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form action="" data-template="{{ route('admin.projects.destroy', ['project' => '*****']) }}"
                            method="post" class="d-inline-block" id="confirm-delete">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-warning" href="{{ route('admin.projects.create', ['project' => $project->id]) }}">New</a>
        {{ $projects->links() }}
    </div>
@endsection
