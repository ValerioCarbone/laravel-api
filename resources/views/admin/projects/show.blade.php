@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <h2>{{ $project->title }}</h2>
            <p><strong>#ID {{ $project->id }}</strong></p>
            <p>{{ $project->content }}</p>
        </div>
    </section>
@endsection
