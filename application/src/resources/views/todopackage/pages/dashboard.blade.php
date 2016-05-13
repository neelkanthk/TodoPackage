@extends('todopackage::layouts.master')

@section('title')
{{ 'Dashboard' }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="alert alert-info">
        <span class="">Dashboard</span>
        <a href="">Logout</a>
    </div>

    <h2>Add Tasks</h2>

    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Category Form -->
    <form action="{{ url('todo/task') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task Name</label>
            <div class="col-sm-6">                
                <input type="text" name="name" id="task-name" class="form-control">

            </div>

        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i> Add task
                </button>
            </div>
        </div>

    </form>
    <h2>Tasks</h2>
    <table class="table table-striped task-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>

        <tbody>
            @if(!empty($tasks))
            @foreach ($tasks as $task)
            <tr>
                <?php //dd($task); ?>

                <td table-text>
                    <a href="{{ url('admin/category') }}/{{ $task->id }}">{{ $task->name }}</a> <br>
                </td>      

                <td table-text>{{ $task->created_at }}</td>

                <td table-text>
                    <form action="{{ url('todo/task')}}/{{ $task->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-plus"></i> Delete Task
                        </button>
                    </form>
                </td>
            </tr>


            @endforeach
            @endif
        </tbody>
    </table>

</div>
@endsection