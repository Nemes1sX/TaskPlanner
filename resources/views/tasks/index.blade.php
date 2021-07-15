@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-center">User tasks</h2>
        </div>
        <p style="text-align: center">
        <a class=" btn btn-success" href="{{route('task.create')}}">Create task</a>
        </p>
        @if($message = Session::get('success'))
            <div class="alert col-lg-9 alert-success alert-box templates">
                <p class="text-center">{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="col-lg-8 col-md-8 center-table tasks">
        <table class="table table-bordered table-responsive-lg table-responsive-md">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Spent tiime</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    @if ($task->start_time && !$task->end_time)
                        {{$task->spent_time + $task->timeSpent()}} minutes
                    @elseif ($task->start_time && $task->end_time)
                        {{$task->spent_time}} minutes
                    @else
                        0 minutes
                    @endif
                </td>
                <td>
                    <div class="input-group">
                        <a class="actions" href="{{route('task.show', $task)}}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a class="actions" href="{{route('task.edit',$task)}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{route('task.destroy', $task)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" title="delete"
                                    onclick="return confirm('Are you sure to delete');"
                            >
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tasks->links() }}
    </div>
</div>
@endsection