@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        <div class="card" style="width: 18rem;">
            @if ($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="card-img-top">
            @endif
            <div class="card-body">
                <h2 class="card-title">{{ $project->title }}</h2>
                <h4>{{ $project->type->type }}</h4>
                <h4>{{ $project->date }}</h4>
                <h4>{{ $project->name }}</h4>
                <h4>{{ $project->surname }}</h4>
                <h4>{{ $project->type->collabs }}</h4>
                <h4>{{ implode(', ', $project->technologies->pluck('technology')->all()) }}</h4>
                <p class="card-text">{{ $project->description }}</p>
                <a href="#" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
@endsection
