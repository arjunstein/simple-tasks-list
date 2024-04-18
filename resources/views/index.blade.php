@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <div>
        <div>
            <a href="{{ route('tasks.create') }}">Add new task</a>
        </div><br>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        @empty
            <div> There are no tasks</div>
        @endforelse
    </div>
@endsection
