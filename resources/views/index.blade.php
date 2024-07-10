@extends('layouts.app')

@section('title', 'The list of tasks laravel course udemy 2024')

@section('content')
    <div>
        <h1>Learn progress: {{ number_format($progress,1) }}% from 100%</h1>
        <nav class="mb-4">
            <a href="{{ route('tasks.create') }}" class="link">Add new
                task</a>
        </nav>

        @forelse ($tasks as $task)
            <div class="flex gap-2">
                <h4>{{ $task->id }}. </h4>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                    @class(['line-through' => $task->completed])>{{ $task->title }}</a>
            </div>
        @empty
            <div> There are no tasks</div>
        @endforelse

        @if ($tasks->count())
            <nav class="mt-4">
                {{ $tasks->links() }}
            </nav>
        @endif

    </div>
@endsection
