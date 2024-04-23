@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p>
        @if ($task->completed)
            Completed
        @else
        Not Complete
        @endif
    </p>

    <div>
        <a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit task</a>
    </div>

    <div>
        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit">
                {{ $task->completed ? 'Mark as incomplete' : 'Mark as complete' }}
            </button>
        </form>
    </div>

    <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete task</button>
    </form>
@endsection
