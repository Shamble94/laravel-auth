@extends("layouts.admin")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <p>{{ $project->id }}</p>
            <h2>{{ $project->name }}</h2>
            <p>{{ $project->slug }}</p>
            <p>{{ $project->description }}</p>
            <p>{{ $project->assigned_by }}</p>
        </div>
    </div>
</div>


@endsection