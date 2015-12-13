@extends('layouts.app')
@section('content')
    @include('common.errors')
    @if(count($tasks)>0)
        <div class="container">
            <h2>All Tasks ordered by Name</h2>
            <ul class="list-group">
                @foreach($tasks as $task)
                    <li class="list-group-item">
                        <span class="badge">{{ $task->id }}</span>
                        {{ $task->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection