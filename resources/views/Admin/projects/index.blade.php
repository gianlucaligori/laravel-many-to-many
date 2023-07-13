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
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Collabs</th>
                    <th scope="col">Techology</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
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
                                <a class="btn btn-primary me-2"
                                    href="{{ route('admin.projects.show', ['project' => $project->id]) }}">View</a>
                                <a class="btn btn-warning me-2"
                                    href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">Edit</a>
                                <button type="button" class="myModal btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#myInput" data-id="{{ $project->id }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade w-100" id="myInput" tabindex="-1" aria-labelledby="myInput" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        This will permanently delete it!
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>

                        <form action="{{ route('admin.projects.destroy', ['project' => '***']) }}" {{-- action="http://localhost:8000/admin/posts/0/harddelete" --}}
                            method="post" class="d-inline-block" id="myForm">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-warning" href="{{ route('admin.projects.create', ['project' => $project->id]) }}">New Project</a>
        {{ $projects->links() }}
    </div>
@endsection
