@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th class="w-50" scope="col">Descrizione</th>
                    <th scope="col">Data</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $project->title }}</th>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->date }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->surname }}</td>
                    <td>
                        <a class="btn btn-warning d-inline-block">Edit</a>
                        <a class="btn btn-danger d-inline-block">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
