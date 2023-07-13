@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        <h1>Add new project</h1>



        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}">
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
                    id="type" name="type_id">
                    <option selected>Open this select Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
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
                            @if (in_array($technology->id, old('technologies', []))) checked @endif>
                        <label class="form-check-label"
                            for="technology{{ $technology->id }}">{{ $technology->technology }}</label>
                    </div>
                @endforeach




                <div class="mb-3">
                    <label for="url_image" class="form-label">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ old('date') }}">
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Surname</label>
                    <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname"
                        name="surname" value="{{ old('surname') }}">
                    @error('surname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Collabs</label>
                    <input type="text" class="form-control @error('collabs') is-invalid @enderror" id="collabs"
                        name="collabs" value="{{ old('collabs') }}">
                    @error('collabs')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="content" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="10"
                        name="description">{{ old('description') }}</textarea>
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
