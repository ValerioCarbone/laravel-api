@extends('layouts.app')

@section('content')
    <section class="py-4">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th>
                            <a class="btn btn-primary " href="{{ route('admin.projects.create') }}">New</a>
                        </th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $project)
                        <tr>
                            <td>
                                <strong>
                                    {{ $project->id }}
                                </strong>
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}">
                                    {{ $project->title }}
                                </a>
                            </td>
                            <td>
                                {{ $project->content }}
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>There are no projects.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
