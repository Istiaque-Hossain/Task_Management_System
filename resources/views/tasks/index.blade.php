@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tasks</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row mb-3">
            <div class="col-md-8">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
            </div>
            <div class="col-md-4">

                <form method="GET" action="{{ route('tasks.index') }}">
                    <div class="row">
                        <div class="col-md-8">
                            <select name="status" class="form-select">
                                <option value="">All</option>
                                <option value="Pending" @selected(request('status') == 'Pending')>Pending</option>
                                <option value="In Progress" @selected(request('status') == 'In Progress')>In Progress</option>
                                <option value="Completed" @selected(request('status') == 'Completed')>Completed</option>
                            </select>
                        </div>


                        <div class="col-md-4">
                            <button type="submit" class="btn btn-outline-primary w-100" id="button-addon2">Filter</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
