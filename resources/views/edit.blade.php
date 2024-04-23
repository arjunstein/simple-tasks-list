@extends('layouts.app')

@section('content')
    @include('forms', ['task', $task])
@endsection
