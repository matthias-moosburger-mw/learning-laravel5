@extends('layouts.app')
@section('content')
        <!-- Bootstrap Boilerplate... -->
<div class="panel-body" xmlns="http://www.w3.org/1999/html">
    <!-- Display Validation Errors -->
    @include('common.errors')

            <!-- New Task Form -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="/task" method="POST" class="bs-component">
                    {{ csrf_field() }}

                            <!-- Task Name -->
                    <label for="task" class="control-label">Add Task:</label>
                    <div class="input-group">
                        <input type="text" placeholder="Add a task…" name="name" id="task-name" class="form-control">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if(count($tasks) > 0)
    <div class="panel panel-inverted">
        <div class="panel-heading">
            <h3>Current Tasks</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                <th>Task</th>
                <th>&nbsp;</th>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        {{--Task Name--}}
                        <td class="table-text">
                            <div>{{ $task->name }}</div>
                        </td>
                        <td class="text-right">
                            <form action="/task/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection