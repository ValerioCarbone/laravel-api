@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h2>Create new project</h2>
            <form action="{{ route('admin.projects.store') }}" method="post">

                @csrf

                <div class="container">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                            value="{{ old('title') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                        <textarea class="form-control" name="content" id="content" rows="3">{{ old('content') }}</textarea>
                    </div>
                </div>

                <input type="submit" value="Create">
            </form>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
@endsection
