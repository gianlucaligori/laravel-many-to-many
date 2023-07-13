@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Technology</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $technology->technology }}</td>
                    <td>
                        <div class="d-flex justify-content-start">
                            <a class="btn btn-warning me-2"
                                href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}">Edit</a>
                            <button type="button" class="js-delete btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-id="{{ $technology->id }}">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
