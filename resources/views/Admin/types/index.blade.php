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

                    <th scope="col">Type</th>
                    <th scope="col">Collabs</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>

                        <td>{{ $type->type }}</td>
                        <td>{{ $type->collabs }}</td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <a class="btn btn-primary me-2"
                                    href="{{ route('admin.types.show', ['type' => $type->id]) }}">View</a>
                                <a class="btn btn-warning me-2"
                                    href="{{ route('admin.types.edit', ['type' => $type->id]) }}">Edit</a>
                                <button type="button" class="myModal btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#myInput" data-id="{{ $type->id }}">Delete</button>
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

                        <form action="{{ route('admin.types.destroy', ['type' => '***']) }}" {{-- action="http://localhost:8000/admin/posts/0/harddelete" --}}
                            method="post" class="d-inline-block" id="myForm">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-warning" href="{{ route('admin.types.create', ['type' => $type->id]) }}">New Type</a>
        {{ $types->links() }}
    </div>
@endsection
