@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">&#x2190; Go
            Back To The Task List</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} &#x2022;
        Updated {{ $task->updated_at->diffForHumans() }}</p>

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}"
            class="btn">Edit
        </a>
        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit"
                class="btn">
                {{ $task->completed ? 'Mark as incomplete' : 'Mark as complete' }}
            </button>
        </form>

        <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="btn">Delete
                task</button>
        </form>
    </div>

@endsection
