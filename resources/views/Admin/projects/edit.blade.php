@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        <h1>Edit project</h1>
        <form method="POST" action="{{ route('admin.projects.update', ['project' => $project]) }}"
            enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <label class="input-group-text  @error('image') is-invalid @enderror" for="image">Upload</label>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>

                <select class="form-select @error('type') is-invalid @enderror" aria-label="Default select example"
                    id="type" name="type" value="{{ old('type', $project->type->type) }}">
                    <option selected>Open this select Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id', $project->type->id) == $type->id) selected @endif>
                            {{ $type->type }}
                        </option>
                    @endforeach
                </select>

                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="technology" class="form-label">Technology</label>

                @foreach ($technologies as $technology)
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="technology{{ $technology->id }}"
                            name="technologies[]" value="{{ $technology->id }}"
                            @if (in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all()))) checked @endif>
                        <label class="form-check-label"
                            for="technology{{ $technology->id }}">{{ $technology->technology }}</label>
                    </div>
                @endforeach

                @error('technology')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="url_image" class="form-label">Date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                    value="{{ old('date', $project->date) }}">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            <div class="mb-3">
                <label for="title" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $project->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Surname</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname"
                    name="surname" value="{{ old('surname', $project->surname) }}">
                @error('surname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Collabs</label>
                <input type="text" class="form-control @error('collabs') is-invalid @enderror" id="collabs"
                    name="collabs" value="{{ old('collabs', $project->type->collabs) }}">
                @error('collabs')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="10"
                    name="description">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
