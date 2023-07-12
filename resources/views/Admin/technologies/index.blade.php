@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        @if (session('delete_success'))
            @php $technology = session('delete_success') @endphp
            <div class="alert alert-danger">
                The technology "{{ $technology->technology }}" has been deleted forever
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Techology</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td>{{ implode(', ', $type->technologies->pluck('technology')->all()) }}</td>



                        <td>
                            <div class="d-flex justify-content-start">
                                <a class="btn btn-primary me-2"
                                    href="{{ route('admin.technologies.show', ['type' => $type->id]) }}">View</a>
                                <a class="btn btn-warning me-2"
                                    href="{{ route('admin.technologies.edit', ['type' => $type->id]) }}">Edit</a>
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
                        <form action=""
                            data-template="{{ route('admin.technologies.destroy', ['technology' => '*****']) }}"
                            method="post" class="d-inline-block" id="confirm-delete">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-warning" href="{{ route('admin.technologies.create', ['technology' => $technology->id]) }}">New
            Technology/a>
            {{ $types->links() }}
    </div>
@endsection
