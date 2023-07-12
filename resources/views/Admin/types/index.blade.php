@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        @if (session('delete_success'))
            @php $type = session('delete_success') @endphp
            <div class="alert alert-danger">
                The type "{{ $type->type }}" has been deleted forever
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
                @foreach ($types as $type)
                    <tr>

                        <td>{{ $type->type }}</td>
                        <td>{{ $type->collabs }}</td>
                        <td>{{ implode(', ', $type->technologies->pluck('technology')->all()) }}</td>



                        <td>
                            <div class="d-flex justify-content-start">
                                <a class="btn btn-primary me-2"
                                    href="{{ route('admin.types.show', ['type' => $type->id]) }}">View</a>
                                <a class="btn btn-warning me-2"
                                    href="{{ route('admin.types.edit', ['type' => $type->id]) }}">Edit</a>
                                <button type="button" class="js-delete btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-id="{{ $type->id }}">Delete</button>
                            </div>
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
                        <form action="" data-template="{{ route('admin.types.destroy', ['project' => '*****']) }}"
                            method="post" class="d-inline-block" id="confirm-delete">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-warning" href="{{ route('admin.types.create', ['type' => $type->id]) }}">New Type</a>
        {{ $types->links() }}
    </div>
@endsection
