@extends('layouts.app')
@section('content')
<div class="panel-body">
    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Task</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">

                <form action="{{ route('task.update', $task->id) }}" method="POST" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-trash"></i>Update
                            </button>
                        </form> 
                <a class="btn btn-info" href="{{ route('tasks.index') }}"> Back</a>
            </div>
        </div>
    </form>
</div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection