@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Task</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Task Description (Optional)</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Task Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="Pending" {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ old('status', $task->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date (Optional)</label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date', $task->due_date) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
